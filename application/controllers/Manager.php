<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('User','Menu','Bahanbaku','Cart','Komposisi','Meja','Transaksi','Employee','Posisi','Pengeluaran','Detailpenggajian','Belanja','Detailbelanja'));
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

    public function dashboard()
	{
        $data['title'] = 'Selamat Datang';
        $getTransaksi = Transaksi::selectRaw('*, sum(qty) as qty,DATE(transaksi.created_at) as day')
                                ->groupBy('day')
                                ->get();
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