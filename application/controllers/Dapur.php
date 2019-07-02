<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dapur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('User','Menu','Bahanbaku','Cart','Komposisi','Meja','Menu','Transaksi'));
        
    }
    public function index()
	{
        $data['title'] = 'Selamat Datang';
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('dapur/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function getTransaksi()
    {
        $transaksi = Transaksi::get();
        $returntransaksi = '';
        foreach($transaksi as $key=>$value){
            $menu = Menu::where('id_menu',$value->id_menu)->get();
            $returntransaksi .= '<div class="card">';
            $returntransaksi .= '<div class="card-body">';
            $returntransaksi .= '<div class="col-md-8 col-sm-8" style="float:left">';
            $returntransaksi .= 'nama menu : '.$menu[0]['nama_menu'].' <br> jumlah : ' . $value->qty.' <br> catatan khusus : '. $value->notes.' <br> status : '. $value->status;
            $returntransaksi .= '</div>';
            $returntransaksi .= '<div class="col-md-4 col-sm-4" style="float:right">';
            $returntransaksi .= '<form method="post" action="'.base_url().'proses-order">';
            $returntransaksi .= '<input type="hidden" name="id_transaksi" value="'.$value->id_transaksi.'">';
            $returntransaksi .= '<button type="submit" class="btn btn-primary btn-sm" style="float:right">Proses</button>';
            $returntransaksi .= '</form>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
            $returntransaksi .= '</div>';
        }
        echo $returntransaksi;
    }

    public function proses()
    {
        if(isset($_POST['proceed'])){
            $time = $this->input->post('waktu_penyajian');
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
            redirect(base_url().'employee/dapur');
        }else{
            $data['title'] = 'Selamat Datang';
            $data['id_transaksi'] = $this->input->post('id_transaksi');
            $data['header']=$this->load->view('templates/home/header',$data, true);
            $data['content']=$this->load->view('dapur/modal',$data, true);
            $data['footer']=$this->load->view('templates/home/footer',$data, true);
            $this->load->view('templates/home/index',$data);
        }
        
    }
    
}