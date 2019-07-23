<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('User','Menu','Payment','Bahanbaku','Cart','Komposisi','Meja','Transaksi','Employee','Posisi','Pengeluaran','Detailpenggajian','Belanja','Detailbelanja','Feedback'));
        if(!isset($_SESSION['emloggedin'])){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }else if($this->session->userdata('employee')['privillege']!='manager'){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }
    }
    public function index()
	{
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    public function feedback()
	{
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $feedback = Feedback::get();
        $q11=0;$q12=0;$q13=0;$q14=0;$q15=0;
        $q21=0;$q22=0;$q23=0;$q24=0;$q25=0;
        $q31=0;$q32=0;$q33=0;$q34=0;$q35=0;
        $comment='';
        foreach($feedback as $key=>$value){
            if($value->id_pertanyaan == 0){
                if($value->nilai == 1){
                    $q11 += 1;
                }
                if($value->nilai == 2){
                    $q12 += 1;
                }
                if($value->nilai == 3){
                    $q13 += 1;
                }
                if($value->nilai == 4){
                    $q14 += 1;
                }
                if($value->nilai == 5){
                    $q15 += 1;
                }
            }
            if($value->id_pertanyaan == 1){
                if($value->nilai == 1){
                    $q21 += 1;
                }
                if($value->nilai == 2){
                    $q22 += 1;
                }
                if($value->nilai == 3){
                    $q23 += 1;
                }
                if($value->nilai == 4){
                    $q24 += 1;
                }
                if($value->nilai == 5){
                    $q25 += 1;
                }
            }
            if($value->id_pertanyaan == 2){
                if($value->nilai == 1){
                    $q31 += 1;
                }
                if($value->nilai == 2){
                    $q32 += 1;
                }
                if($value->nilai == 3){
                    $q33 += 1;
                }
                if($value->nilai == 4){
                    $q34 += 1;
                }
                if($value->nilai == 5){
                    $q35 += 1;
                }
            }
            if($value->id_pertanyaan == 3 && $value->nilai != ''){
                $comment .= '<li class="list-group-item">'.$value->nilai.'</li>';
            }
        }
        $data['feedback'] = $feedback;
        $data['q11']=$q11;$data['q12']=$q12;$data['q13']=$q13;$data['q14']=$q14;$data['q15']=$q15;
		$data['q21']=$q21;$data['q22']=$q22;$data['q23']=$q23;$data['q24']=$q24;$data['q25']=$q25;
        $data['q31']=$q31;$data['q32']=$q32;$data['q33']=$q33;$data['q34']=$q34;$data['q35']=$q35;
        $data['comment'] = $comment;
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/feedback',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function dashboard()
	{
        $data['title'] = 'Selamat Datang';
        if(isset($_GET['from'])&&$_GET['from']!=''&&isset($_GET['to'])&&$_GET['to']!=''){
            $getTransaksi = Transaksi::selectRaw('*, sum(qty) as qty,DATE(transaksi.created_at) as day')
                                ->groupBy('day')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
        }else{
            $getTransaksi = Transaksi::selectRaw('*, sum(qty) as qty,DATE(transaksi.created_at) as day')
                                ->groupBy('day')
                                ->get();
        }
        $label = '';
        $dataset = '';
        $labelmakanan = '';
        $datasetmakanan = '';
        $labelminuman = '';
        $datasetminuman = '';
        $getTopMakanan = Transaksi::selectRaw('*, sum(qty) as qty')
                                ->leftJoin('menu', 'transaksi.id_menu','=','menu.id_menu')
                                ->where('menu.jenis_menu','makanan')
                                ->groupBy('transaksi.id_menu')
                                ->orderBy('qty', 'DESC')
                                ->limit(10)
                                ->get();
        $getTopMinuman = Transaksi::selectRaw('*, sum(qty) as qty')
                                ->leftJoin('menu', 'transaksi.id_menu','=','menu.id_menu')
                                ->where('menu.jenis_menu','minuman')
                                ->groupBy('transaksi.id_menu')
                                ->orderBy('qty', 'DESC')
                                ->limit(10)
                                ->get();

        foreach($getTransaksi as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $label .= "'".$dates."'".",";
            $dataset .= $value->qty.',';
        }

        foreach($getTopMakanan as $key=>$value){
            $labelmakanan .= "'".$value->nama_menu."'".",";
            $datasetmakanan .= $value->qty.',';
        }
        foreach($getTopMinuman as $key=>$value){
            $labelminuman .= "'".$value->nama_menu."'".",";
            $datasetminuman .= $value->qty.',';
        }
        // var_dump($labelminuman);
        // return false;
        $data['ovo'] = Payment::where('metode','ovo')->count();
        $data['cash'] = Payment::where('metode','cash')->count();
        $data['gopay'] = Payment::where('metode','gopay')->count();
        $data['label'] = $label;
        $data['dataset'] = $dataset;
        $data['labelmakanan'] = $labelmakanan;
        $data['datasetmakanan'] = $datasetmakanan;
        $data['labelminuman'] = $labelminuman;
        $data['datasetminuman'] = $datasetminuman;
        $data['sess'] = $this->session->userdata('employee');
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/dashboard',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function gaji()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['pengeluaran'] = Pengeluaran::where('jenis_pengeluaran','penggajian')->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/gaji',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function detailgaji($id)
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['detailpenggajian'] = Detailpenggajian::where('id_penggajian',$id)->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/detailgaji',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function tambahgaji()
    {
        $data['title'] = 'Selamat Datang';
        $data['employee'] = Employee::get();
        $data['sess'] = $this->session->userdata('employee');
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/addgaji',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function listbelanja()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['belanja'] = Belanja::get();
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/listbelanja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    public function detailbelanja($id)
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['idbelanja'] = $id;
		$data['detailbelanja'] = Detailbelanja::where('id_belanja',$id)->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/detailbelanja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function postgaji()
    {
        $datadetailgaji = array();
        $jumlahpegawai = count($this->input->post('id_employee'));
        $datapengeluaran = array(
            'jenis_pengeluaran'     => 'penggajian',
            'deskripsi'             => $this->input->post('deskripsi')
        );

        $postpengeluaran = Pengeluaran::create($datapengeluaran);

        $totalgaji = 0;
        for($i=0;$i<$jumlahpegawai;$i++){
            array_push($datadetailgaji,array(
                'id_penggajian'     => $postpengeluaran->id,
                'id_employee'       => $this->input->post('id_employee')[$i],
                'punishment'        => $this->input->post('punishment')[$i],
                'detail_punishment' => $this->input->post('detail_punishment')[$i],
                'total_gaji'        => $this->input->post('gaji')[$i] - $this->input->post('punishment')[$i]
            ));
            $totalgaji += $this->input->post('gaji')[$i] - $this->input->post('punishment')[$i];
        }
        
        $dp = Detailpenggajian::insert($datadetailgaji);
        $p = Pengeluaran::where('id_pengeluaran',$postpengeluaran->id)->update(['jumlah'=>$totalgaji]);

        if($dp = true && $p = 1){
            redirect(base_url().'manager/gaji');
        }else{
            echo '<script>alert("error"); window.location = "'.base_url().'manager/tambah-penggajian";</script>';
        }

        // var_dump($dp);
        // var_dump($p);
        // return false;

    }

    public function approve($id)
    {
        $update = Belanja::where('id_belanja',$id)->update(['status'=>'disetujui']);
        if($update == 1){
            redirect(base_url().'manager/list-belanja');
        }else{
            echo '<script>alert("error"); window.location = "'.base_url().'manager/list-belanja/detail/'.$id.'";</script>';
        }

    }
}