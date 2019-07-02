<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

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
        $data['content']=$this->load->view('login/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }

    public function auth()
    {
        $uname = $this->input->post('username');
        $pwd = $this->input->post('password');
        $check = User::where('username',$uname)->where('password',$pwd)->count();
        
        if($check>0){
            $user = User::where('username',$uname)->where('password',$pwd)->get();
            $sess = array(
                'username' => $uname,
                'privillege' => $user[0]['privillege']
            );
            $this->session->set_userdata('employee',$sess);
            $this->session->set_userdata('emloggedin',TRUE);
            redirect(base_url().'employee/'.$user[0]['privillege']);
        }else{
            echo '<script>alert("username atau password salah, silahkan periksa kembali"); window.location = "'.base_url().'employee";</script>';
        }
    }
}