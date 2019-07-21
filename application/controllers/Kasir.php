<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('User','Menu','Bahanbaku','Cart','Komposisi','Meja','Menu','Transaksi','Payment'));
        if(!isset($_SESSION['emloggedin'])){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }else if($this->session->userdata('employee')['privillege']!='kasir'){
            echo '<script>alert("Authentication required"); window.location = "'.base_url().'employee";</script>';
        }
    }
    public function index()
	{
        $data['title'] = 'Selamat Datang';
        $data['meja'] = Meja::get(['no_meja']);
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('kasir/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    public function getMeja()
    {
        $return = '';
        $meja = Meja::get(['no_meja','status','nama_customer','email','no_hp']);
        foreach($meja as $key=>$value):
            $class='';
            if($value->status == 1){
                $class= 'crimson twhite';
            }

            if($value->status == 0 && $value->nama_customer!=''){
                $class= 'cornflowerblue twhite';
            }
            

            if($value->nama_customer!='' || $value->nama_customer!=NULL){
                $nama = $value->nama_customer;
            }else{
                $nama = '-';
            }
            if($value->email!='' || $value->email!=NULL){
                $email = $value->email;
            }else{
                $email = '-';
            }
            if($value->no_hp!='' || $value->no_hp!=NULL){
                $no_hp = $value->no_hp;
            }else{
                $no_hp = '-';
            }
            
            $return .= '<div class="col-md-3 col-sm-2"style="margin-bottom:10px">
                <div class="card">
                    <img src="https://thumbor.forbes.com/thumbor/1280x868/https%3A%2F%2Fspecials-images.forbesimg.com%2Fdam%2Fimageserve%2F1072007868%2F960x0.jpg%3Ffit%3Dscale" class="card-img-top" alt="...">
                    <div class="card-body '.$class.'" style="font-size:10px;">
                        <h5 class="card-title">Meja '.$value->no_meja.'</h5>
                        <p class="card-text font-weight-bold">
                        Nama: '.$nama.' <br>
                        Email: '.$email.' <br>
                        No.HP: '.$no_hp.'</p>
                        <form method="post" action="'.base_url().'kasir/open">
                        <input type="hidden" name="no_meja" value="'.$value->no_meja.'">
                        <button type="submit" class="btn btn-primary btn-sm">Open</button>
                        </form>
                    </div>
                </div>
            </div>';
        endforeach;
        echo $return;
    }

    public function open()
    {
        $no_meja = $this->input->post('no_meja');
        $data['emsess'] = $this->session->userdata('employee');
        $data['title'] = 'Invoice';
        $data['meja'] = Meja::where('no_meja',$no_meja)->get();
        // var_dump($data['meja']);
        // return false;
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('kasir/open',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    public function close()
    {
        if(isset($_GET['id'])&&$_GET['id']!=''){
            $id = $_GET['id'];
            $closetable = Meja::where('no_meja',$id)->update(['status'=> 0,'nama_customer'=>'','email'=>'','no_hp'=>'','active_transaction'=>'']);
            if($closetable){
                redirect(base_url().'employee/kasir');
            }else{
                echo '<script>alert("error"); window.location = "'.base_url().'employee/kasir";</script>';
            }
        }
    }
}