<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        
    }
	public function index()
	{
        $data['title'] = 'Selamat Datang';
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('home/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    
    public function login($meja)
    {
        $data['meja'] = $meja;
        $data['title'] = 'Login Meja';
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('home/login',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function login_proccess()
    {
        $data['no_meja'] = $this->input->post('meja');
        $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
        if($this->input->post('email')!=''){
            $data['email'] = $this->input->post('email');
        }else{
            $data['email'] = '-';
        }
        if($this->input->post('no_hp')!=''){
            $data['no_hp'] = $this->input->post('no_hp');
        }else{
            $data['no_hp'] = '-';
        }
        $this->session->set_userdata('loggedin',TRUE);
        $this->session->set_userdata('meja',$data);
        redirect(base_url().'home/menu');
    }

    public function menu()
    {
        $sessMeja               = $this->session->userdata('meja');
        $data['meja']           = $sessMeja['no_meja'];
        $data['nama_pelanggan'] = $sessMeja['nama_pelanggan'];
        $data['email']          = $sessMeja['email'];
        $data['no_hp']          = $sessMeja['no_hp'];
        $data['title']          = 'Pilih Menu';
		$data['header']         = $this->load->view('templates/home/header',$data, true);
        $data['content']        = $this->load->view('home/menu',$data, true);
        $data['footer']         = $this->load->view('templates/home/footer',$data, true);

		$this->load->view('templates/home/index',$data);
    }
}
