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
            $f1 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '0')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
            $f2 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '1')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
            $f3 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '2')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
            $getPengeluaran = Pengeluaran::selectRaw('*, sum(jumlah) as jumlah,DATE(pengeluaran.created_at) as day')
                                ->groupBy('day')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
                                
            $getPayment = Payment::selectRaw('*, sum(total) as total,DATE(payment.created_at) as day')
                                ->groupBy('day')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->get();
            
            $data['ovo'] = Payment::where('metode','ovo')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->sum('total');
            $data['cash'] = Payment::where('metode','cash')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->sum('total');
            $data['gopay'] = Payment::where('metode','gopay')
                                ->where('created_at', '>=',$_GET['from'])
                                ->where('created_at', '<=',$_GET['to'])
                                ->sum('total');
            
            
            $data['from'] = $_GET['from'];
            $data['to'] = $_GET['to'];
        }else{
            $getTransaksi = Transaksi::selectRaw('*, sum(qty) as qty,DATE(transaksi.created_at) as day')
                                ->groupBy('day')
                                ->get();
            $getPengeluaran = Pengeluaran::selectRaw('*, sum(jumlah) as jumlah,DATE(pengeluaran.created_at) as day')
                                ->groupBy('day')
                                ->get();
            $getPayment = Payment::selectRaw('*, sum(total) as total,DATE(payment.created_at) as day')
                                ->groupBy('day')
                                ->get();
            $f1 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '0')
                                ->get();
            $f2 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '1')
                                ->get();
            $f3 = Feedback::selectRaw('*, sum(nilai) as nilai,count(*) as dataf,DATE(feedback.created_at) as day')
                                ->groupBy('day')
                                ->where('id_pertanyaan', '2')
                                ->get();
            $data['ovo'] = Payment::where('metode','ovo')->sum('total');
            $data['cash'] = Payment::where('metode','cash')->sum('total');
            $data['gopay'] = Payment::where('metode','gopay')->sum('total');
            $data['from'] = '';
            $data['to'] = '';
        }
        $label = '';
        $dataset = '';
        $labelf1 = '';
        $datasetf1 = '';
        $labelf2 = '';
        $datasetf2 = '';
        $labelf3 = '';
        $datasetf3 = '';
        $labelmakanan = '';
        $datasetmakanan = '';
        $labelminuman = '';
        $datasetminuman = '';
        $labelpendapatan = '';
        $datasetpendapatan = '';
        $labelpengeluaran = '';
        $datasetpengeluaran = '';
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

        foreach($getPayment as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $labelpendapatan .= "'".$dates."'".",";
            $datasetpendapatan .= $value->total.',';
        }

        
        foreach($getPengeluaran as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $labelpengeluaran .= "'".$dates."'".",";
            $datasetpengeluaran .= $value->jumlah.',';
        }

        foreach($getTransaksi as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $label .= "'".$dates."'".",";
            $dataset .= $value->qty.',';
        }
        
        foreach($f1 as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $labelf1 .= "'".$dates."'".",";
            $datasetf1 .= $value->nilai/$value->dataf.',';
        }
        
        
        foreach($f2 as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $labelf2 .= "'".$dates."'".",";
            $datasetf2 .= $value->nilai/$value->dataf.',';
        }

        foreach($f3 as $key=>$value){
            $date = date_create($value->day);
            $dates = date_format($date,'F j, Y');
            $labelf3 .= "'".$dates."'".",";
            $datasetf3 .= $value->nilai/$value->dataf.',';
        }
        

        foreach($getTopMakanan as $key=>$value){
            $labelmakanan .= "'".$value->nama_menu."'".",";
            $datasetmakanan .= $value->qty.',';
        }
        foreach($getTopMinuman as $key=>$value){
            $labelminuman .= "'".$value->nama_menu."'".",";
            $datasetminuman .= $value->qty.',';
        }
        
        
        $data['label'] = $label;
        $data['dataset'] = $dataset;
        $data['labelf1'] = $labelf1;
        $data['datasetf1'] = $datasetf2;
        $data['labelf2'] = $labelf1;
        $data['datasetf2'] = $datasetf2;
        $data['labelf3'] = $labelf3;
        $data['datasetf3'] = $datasetf3;
        $data['labelpendapatan'] = $labelpendapatan;
        $data['datasetpendapatan'] = $datasetpendapatan;
        $data['labelpengeluaran'] = $labelpengeluaran;
        $data['datasetpengeluaran'] = $datasetpengeluaran;
        $data['labelmakanan'] = $labelmakanan;
        $data['datasetmakanan'] = $datasetmakanan;
        $data['labelminuman'] = $labelminuman;
        $data['datasetminuman'] = $datasetminuman;
        $data['penjualan'] = Transaksi::sum('qty');
        $data['menu'] = Menu::count();
        $data['karyawan'] = Employee::count();
        $data['ratingmenu'] = Feedback::where('id_pertanyaan','0')->sum('nilai') / Feedback::where('id_pertanyaan','0')->count();
        $data['ratingsuasana'] = Feedback::where('id_pertanyaan','1')->sum('nilai') / Feedback::where('id_pertanyaan','0')->count();
        $data['ratingpelayanan'] = Feedback::where('id_pertanyaan','2')->sum('nilai') / Feedback::where('id_pertanyaan','0')->count();
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

    public function menu()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['menu'] = Menu::get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/menu',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function addmenu()
    {
        $data['title'] = 'Selamat Datang';
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/addmenu',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function updatemenu($id)
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['menu'] = Menu::where('id_menu',$id)->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/updatemenu',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function postmenu()
    {
        $data = array(
            'sub_menu'      => $this->input->post('submenu'),
            'nama_menu'     => $this->input->post('namamenu'),
            'deskripsi_menu'      => $this->input->post('deskripsi'),
            'harga_menu'     => $this->input->post('harga'),
            'vendor'      => 'Elther',
            'jenis_menu'     => $this->input->post('jenismenu'),
            'foto'      => $this->input->post('linkfoto')
        );
        $post = Menu::create($data);
        if($post){
            redirect(base_url().'manage-menu');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-menu/add";</script>';
        }
    }
    
    public function putmenu()
    {
        $data = array(
            'sub_menu'      => $this->input->post('submenu'),
            'nama_menu'     => $this->input->post('namamenu'),
            'deskripsi_menu'      => $this->input->post('deskripsi'),
            'harga_menu'     => $this->input->post('harga'),
            'vendor'      => 'Elther',
            'jenis_menu'     => $this->input->post('jenismenu'),
            'foto'      => $this->input->post('linkfoto')
        );
        $put = Menu::where('id_menu',$this->input->post('idmenu'))->update($data);
        if($put){
            redirect(base_url().'manage-menu');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-menu/update/'.$this->input->post('idmenu').'";</script>';
        }
    }

    public function deletemenu($id)
    {
        $delete = Menu::where('id_menu',$id)->delete();
        if($delete){
            redirect(base_url().'manage-menu');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-menu";</script>';
        }
    }

    //meja

    public function meja()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['menu'] = Meja::get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/meja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function addmeja()
    {
        $data['title'] = 'Selamat Datang';
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/addmeja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function updatemeja($id)
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['meja'] = Meja::where('id_meja',$id)->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/updatemeja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function postmeja()
    {
        $data = array(
            'username'      => $this->input->post('username'),
            'password'     => $this->input->post('password'),
            'no_meja'      => $this->input->post('nomeja')
        );
        $nomeja = array();
        $meja = Meja::get();
        foreach($meja as $key=>$value){
            array_push($nomeja,$value->no_meja);
        }
        // var_dump(in_array($this->input->post('nomeja'),$nomeja));
        // return false;
        if(!in_array($this->input->post('nomeja'), $nomeja)){
                $post = Meja::create($data);
                if($post){
                    redirect(base_url().'manage-meja');
                }else{
                    echo '<script>alert("Error"); window.location = "'.base_url().'manage-meja/add";</script>';
                }
        }else{
            echo '<script>alert("Nomor Meja Sudah Ada"); window.location = "'.base_url().'manage-meja/add/";</script>';
        }
    }
    
    public function putmeja()
    {
        $data = array(
            'username'      => $this->input->post('username'),
            'password'     => $this->input->post('password'),
            'no_meja'      => $this->input->post('nomeja')
        );
        $nomeja = array();
        $meja = Meja::get();
        foreach($meja as $key=>$value){
            array_push($nomeja,$value->no_meja);
        }
        if(in_array($this->input->post('nomeja'),$nomeja)){
            $put = Meja::where('id_meja',$this->input->post('idmeja'))->update($data);
            if($put){
                redirect(base_url().'manage-meja');
            }else{
                echo '<script>alert("Error"); window.location = "'.base_url().'manage-meja/update/'.$this->input->post('idmeja').'";</script>';
            }
        }else{
            echo '<script>alert("Nomor Meja Sudah Ada"); window.location = "'.base_url().'manage-meja/update/'.$this->input->post('idmeja').'";</script>';
        }
    }

    public function deletemeja($id)
    {
        $delete = Meja::where('id_meja',$id)->delete();
        if($delete){
            redirect(base_url().'manage-meja');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-meja";</script>';
        }
    }

    //end meja

    public function postkaryawan()
    {
        $data = array(
            'nama'      => $this->input->post('namakaryawan'),
            'posisi'     => $this->input->post('posisi')
        );
        $post = Employee::create($data);
        if($post){
            redirect(base_url().'manage-karyawan');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-karyawan/add";</script>';
        }
    }
    
    public function putkaryawan()
    {
        $data = array(
            'nama'      => $this->input->post('namakaryawan'),
            'posisi'     => $this->input->post('posisi')
        );
        $put = Employee::where('id_employee',$this->input->post('idkaryawan'))->update($data);
        if($put){
            redirect(base_url().'manage-karyawan');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-karyawan/update/'.$this->input->post('idkaryawan').'";</script>';
        }
    }

    public function deletekaryawan($id)
    {
        $delete = Employee::where('id_employee',$id)->delete();
        if($delete){
            redirect(base_url().'manage-karyawan');
        }else{
            echo '<script>alert("Error"); window.location = "'.base_url().'manage-karyawan";</script>';
        }
    }

    public function karyawan()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['employee'] = Employee::get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/karyawan',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function addkaryawan()
    {
        $data['title'] = 'Selamat Datang';
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/addkaryawan',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function updatekaryawan($id)
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['employee'] = Employee::where('id_employee',$id)->get();
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('manager/updatekaryawan',$data, true);
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
        $databelanja = Belanja::where('id_belanja',$id)->get();
        if($update == 1){
            $pengeluaran = array(
                'jenis_pengeluaran'     => 'belanja',
                'fk_pengeluaran'        => $id,
                'deskripsi'             => $databelanja[0]['deskripsi'],
                'jumlah'                => $databelanja[0]['permintaan_biaya']
            );
            Pengeluaran::create($pengeluaran);
            redirect(base_url().'manager/list-belanja');
        }else{
            echo '<script>alert("error"); window.location = "'.base_url().'manager/list-belanja/detail/'.$id.'";</script>';
        }

    }
}