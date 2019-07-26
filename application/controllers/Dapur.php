<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('User','Menu','Bahanbaku','Cart','Komposisi','Meja','Menu','Transaksi','Belanja','Detailbelanja','Pengeluaran'));
        if(!isset($_SESSION['emloggedin'])){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }else if($this->session->userdata('employee')['privillege']!='dapur'){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }
    }
    public function index()
	{
        $data['title'] = 'Selamat Datang';
		$data['sess'] = $this->session->userdata('employee');
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('dapur/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    
    public function listpesanan()
	{
        $data['title'] = 'Selamat Datang';
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('dapur/listpesanan',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function belanja()
    {
        $data['title'] = 'Selamat Datang';
        $data['sess'] = $this->session->userdata('employee');
        $data['belanja'] = Belanja::get();
        $data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('dapur/belanja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function addbelanja()
    {
        $data['title'] = 'Selamat Datang';
        $data['bahanbaku'] = Bahanbaku::get();
        $data['sess'] = $this->session->userdata('employee');
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('dapur/addbelanja',$data, true);
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
        $data['content']=$this->load->view('dapur/detailbelanja',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function getT()
    {
        date_default_timezone_set('Asia/Jakarta');
        $transaksi = Transaksi::whereDate('created_at','=',date('Y-m-d'))->orderBy('created_at','ASC')->get();
        $returntransaksi = '';
        $no=1;
        foreach($transaksi as $key=>$value){
            $menu = Menu::where('id_menu',$value->id_menu)->get();
            
            $returntransaksi .= '<tr>';
            $returntransaksi .= '<th scope="row">'.$no.'</th>';
            $returntransaksi .= '<td>'.$menu[0]['nama_menu'].'</td>';
            $returntransaksi .= '<td>'.$value->notes.'</td>';
            $returntransaksi .= '<td>'.$value->meja.'</td>';
            $returntransaksi .= '<td>'.$value->qty.'</td>';
            $returntransaksi .= '<td>'.$value->status.'</td>';
            $returntransaksi .= '</tr>';
        }
        echo $returntransaksi;
    }

    public function getTransaksiMakanan()
    {
        
        $this->closeauto();
        $transaksi = Transaksi::orderBy('created_at','ASC')->get();
        $returntransaksi = '';
        foreach($transaksi as $key=>$value){
            if($value->status != 'close'){
            $menu = Menu::where('id_menu',$value->id_menu)->get();
            $onclick = "window.location='".base_url()."close-order/".$value->id_transaksi."'";
            $color = 'btn-primary';
            $dis = '';
            $dispro = '';
            if($value->status == 'close'){
                $color = 'btn-default';
                $dis = 'disabled';
            }
            if($value->status == 'diproses'){
                $dispro = 'disabled';
            }
            if($menu[0]['jenis_menu']=='makanan'){
            $returntransaksi .= '<div class="card">';
            $returntransaksi .= '<div class="card-body">';
            $returntransaksi .= '<div class="col-md-8 col-sm-8" style="float:left">';
            $returntransaksi .= 'Meja : '.$value->meja.'<br>nama menu : '.$menu[0]['nama_menu'].' <br> jumlah : ' . $value->qty.' <br> catatan khusus : '. $value->notes.' <br> status : '. $value->status;
            $returntransaksi .= '</div>';
            $returntransaksi .= '<div class="col-md-4 col-sm-4" style="float:right">';
            $returntransaksi .= '<form method="post" action="'.base_url().'proses-order">';
            $returntransaksi .= '<input type="hidden" name="id_transaksi" value="'.$value->id_transaksi.'">';
            $returntransaksi .= '<button type="submit" class="btn '.$color.' btn-primary btn-sm" style="float:right" '.$dispro.'>Proses</button><br><br>';
            $returntransaksi .= '<button type="button" class="btn '.$color.' btn-sm" onclick="'.$onclick.'" style="float:right"'.$dis.'>Close</button>';
            $returntransaksi .= '</form>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
            }
            }
        }
        echo $returntransaksi;
        
    }

    public function getTransaksiMinuman()
    {
        $this->closeauto();
        $transaksi = Transaksi::orderBy('created_at','ASC')->get();
        $returntransaksi = '';
        foreach($transaksi as $key=>$value){
            if($value->status != 'close'){
            $menu = Menu::where('id_menu',$value->id_menu)->get();
            $onclick = "window.location='".base_url()."close-order/".$value->id_transaksi."'";
            $color = 'btn-primary';
            $dis = '';
            $dispro = '';
            if($value->status == 'close'){
                $color = 'btn-default';
                $dis = 'disabled';
            }
            if($value->status == 'diproses'){
                $dispro = 'disabled';
            }
            if($menu[0]['jenis_menu']=='minuman'){
            $returntransaksi .= '<div class="card">';
            $returntransaksi .= '<div class="card-body">';
            $returntransaksi .= '<div class="col-md-8 col-sm-8" style="float:left">';
            $returntransaksi .= 'Meja : '.$value->meja.'<br>nama menu : '.$menu[0]['nama_menu'].' <br> jumlah : ' . $value->qty.' <br> catatan khusus : '. $value->notes.' <br> status : '. $value->status;
            $returntransaksi .= '</div>';
            $returntransaksi .= '<div class="col-md-4 col-sm-4" style="float:right">';
            $returntransaksi .= '<form method="post" action="'.base_url().'proses-order">';
            $returntransaksi .= '<input type="hidden" name="id_transaksi" value="'.$value->id_transaksi.'">';
            $returntransaksi .= '<button type="submit" class="btn '.$color.' btn-primary btn-sm" style="float:right" '.$dispro.'>Proses</button><br><br>';
            $returntransaksi .= '<button type="button" class="btn '.$color.' btn-sm" onclick="'.$onclick.'" style="float:right"'.$dis.'>Close</button>';
            $returntransaksi .= '</form>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
            }
            }
        }
        echo $returntransaksi;
    }

    public function proses()
    {
        if(isset($_POST['proceed'])){
            $time = $this->input->post('waktu_penyajian');
            if($time < 1){
                echo '<script>alert("Waktu tidak valid"); window.location = "'.base_url().'dapur/list-pesanan";</script>';
            }else{
                $id_transaksi = $this->input->post('id_transaksi');
                if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
                $date = date_create(date("Y-m-d H:i:s"));
                // var_dump($date);
                // return false;
                echo 'Waktu awal: 20-02-2012 19:30:20<br/>';
                $plustime = $time.' minutes';
                date_add($date, date_interval_create_from_date_string($plustime));
                echo 'Tambahkan 10 menit: '.date_format($date, 'Y-m-d H:i:s').'<br/><br/>';
                $data = array('status'=>'diproses','estimated_time'=>date_format($date, 'Y-m-d H:i:s'),'updated_at'=>date_format($date, 'Y-m-d H:i:s'));
                $update = Transaksi::where('id_transaksi',$id_transaksi)->update($data);
                $dataTransaksi = Transaksi::where('id_transaksi',$id_transaksi)->get();
                $komposisi = Komposisi::where('id_menu',$dataTransaksi[0]['id_menu'])->get();
                foreach($komposisi as $key=>$value){
                    $stock = Bahanbaku::where('id_bahan_baku',$value->id_bahan_baku)->get();
                    $terpakai = $value->jumlah_bahan_baku * $dataTransaksi[0]['qty'];
                    $stockupdate = $stock[0]['jumlah'] - $terpakai;
                    Bahanbaku::where('id_bahan_baku',$value->id_bahan_baku)->update(['jumlah'=>$stockupdate]); 
                }
                redirect(base_url().'dapur/list-pesanan');
            }
        }else{
            $data['title'] = 'Selamat Datang';
            $data['id_transaksi'] = $this->input->post('id_transaksi');
            $data['header']=$this->load->view('templates/home/header',$data, true);
            $data['content']=$this->load->view('dapur/modal',$data, true);
            $data['footer']=$this->load->view('templates/home/footer',$data, true);
            $this->load->view('templates/home/index',$data);
        }
        
    }

    public function closeauto()
    {
        $get = Transaksi::whereNotIn('status',['close'])->get();
        foreach($get as $key=>$value){
            if($value->estimated_time != '' || $value->estimated_time != NULL){
                date_default_timezone_set('Asia/Jakarta');
                $awal  = strtotime($value->estimated_time); //waktu awal

                $akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir

                $diff  = $akhir - $awal;

                $jam   = floor($diff / (60 * 60));

                $menit = $diff - $jam * (60 * 60);
                

                // echo $diff;
                // echo ' Waktu Tersisa tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit ';


                if($diff > 0){
                    $this->close($value->id_transaksi);
                }
            }
        }
    }

    public function close($id)
    {
        $data = array('status'=>'close');
        $update = Transaksi::where('id_transaksi',$id)->update($data);
        redirect(base_url().'dapur/list-pesanan');
    }
    public function updateharga()
    {
        $jumlahbahanbaku = count($this->input->post('id_detail_belanja'));
        $totalharga = 0;
        for($i=0;$i<$jumlahbahanbaku;$i++){
            Detailbelanja::where('id_detail_belanja',$this->input->post('id_detail_belanja')[$i])->update(['harga_fix'=>$this->input->post('hargafix')[$i]]);
            $totalharga += $this->input->post('hargafix')[$i]*$this->input->post('jumlah')[$i];
        }
        // var_dump($datadetailbelanja);
        // var_dump($p);
        // return false;
        
        $p = Belanja::where('id_belanja',$this->input->post('idbelanja'))->update(['biaya_fix'=>$totalharga]);
        Pengeluaran::where('fk_pengeluaran',$this->input->post('idbelanja'))->update(['jumlah'=>$totalharga]);
        if($p == 1){
            redirect(base_url().'dapur/belanja');
        }else{
            // echo '<script>alert("error"); window.location = "'.base_url().'dapur/belanja";</script>';
        }
    }

    public function postbelanja()
    {
        $datadetailbelanja = array();
        $jumlahbahanbaku = count($this->input->post('id_bahan_baku'));
        $databelanja = array(
            'deskripsi'             => $this->input->post('deskripsi'),
            'status'                => 'request'
        );

        $postbelanja = Belanja::create($databelanja);

        $totalharga = 0;
        for($i=0;$i<$jumlahbahanbaku;$i++){
            if($this->input->post('jumlahbelanja')[$i] != 0){
                array_push($datadetailbelanja,array(
                    'id_belanja'        => $postbelanja->id,
                    'id_bahan_baku'     => $this->input->post('id_bahan_baku')[$i],
                    'jumlah'            => $this->input->post('jumlahbelanja')[$i],
                    'harga_kisaran'      => $this->input->post('hargakisaran')[$i] * $this->input->post('jumlahbelanja')[$i]
                ));
                $totalharga += $this->input->post('hargakisaran')[$i] * $this->input->post('jumlahbelanja')[$i];
            }
        }
        // var_dump($datadetailbelanja);
        // var_dump($p);
        // return false;
        
        $dp = Detailbelanja::insert($datadetailbelanja);
        $p = Belanja::where('id_belanja',$postbelanja->id)->update(['permintaan_biaya'=>$totalharga]);

        if($dp = true && $p = 1){
            redirect(base_url().'dapur/belanja');
        }else{
            echo '<script>alert("error"); window.location = "'.base_url().'dapur/add-belanja";</script>';
        }

        

    }
    
}