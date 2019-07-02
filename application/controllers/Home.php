<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('Menu','Bahanbaku','Cart','Komposisi','Meja','Menu','Transaksi'));
        
    }
	public function index()
	{
        $data['title'] = 'Selamat Datang';
		$data['header']=$this->load->view('templates/home/header',$data, true);
        $data['content']=$this->load->view('home/index',$data, true);
        $data['footer']=$this->load->view('templates/home/footer',$data, true);
		$this->load->view('templates/home/index',$data);
    }
    
    public function login()
    {
        if($this->session->userdata('loggedin')==TRUE){
            $data['meja'] = $this->session->userdata('meja');
            $data['title'] = 'Login Meja';
            $data['header']=$this->load->view('templates/home/header',$data, true);
            $data['content']=$this->load->view('home/login',$data, true);
            $data['footer']=$this->load->view('templates/home/footer',$data, true);
            $this->load->view('templates/home/index',$data);
        }else{
            echo '<script>alert("login akun meja terlebih dahulu"); window.location = "'.base_url().'";</script>';
        }
        
    }

    public function login_proccess()
    {
        if(isset($_POST['loginmeja'])){
            $uname = $this->input->post('username');
            $pwd = $this->input->post('password');
            $check = Meja::where('username',$uname)->where('password',$pwd)->count();
            if($check>0){
                $meja = Meja::where('username',$uname)->where('password',$pwd)->get();
                $this->session->set_userdata('meja',$meja[0]['no_meja']);
                $this->session->set_userdata('loggedin',TRUE);
                redirect(base_url().'home/login');
            }else{
                echo '<script>alert("username atau password salah, silahkan periksa kembali"); window.location = "'.base_url().'";</script>';
            }
        }else if(isset($_POST['logincustomer'])){
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            if($this->input->post('email')!=''){
                $email = $this->input->post('email');
            }else{
                $email = '-';
            }
            if($this->input->post('no_hp')!=''){
                $no_hp = $this->input->post('no_hp');
            }else{
                $no_hp = '-';
            }
            $data = array(
                'nama_customer' => $nama_pelanggan,
                'email'         => $email,
                'no_hp'         => $no_hp
            );
            $login = Meja::where('no_meja', $this->session->userdata('meja'))->update($data);
            if($login){
                $meja = array('no_meja'=>$this->session->userdata('meja'));
                $dataMeja = array_merge($data,$meja);
                $this->session->set_userdata('dataMeja',$dataMeja);
                redirect(base_url().'home/main');
            }else{
                echo '<script>alert("error"); window.location = "'.base_url().'home/login";</script>';
            }
        }
    }

    public function menu()
    {
        $sessMeja               = $this->session->userdata('dataMeja');
        $data['meja']           = $sessMeja['no_meja'];
        $data['nama_pelanggan'] = $sessMeja['nama_customer'];
        $data['email']          = $sessMeja['email'];
        $data['no_hp']          = $sessMeja['no_hp'];
        $data['title']          = 'Pilih Menu';
        $data['makanan']        = Menu::where('jenis_menu','makanan')->get();
        $data['minuman']        = Menu::where('jenis_menu','minuman')->get();
		$data['countcart']      = Cart::where('meja',$this->session->userdata('meja'))->count(); 
		$data['header']         = $this->load->view('templates/home/header',$data, true);
        $data['content']        = $this->load->view('home/menu',$data, true);
        $data['footer']         = $this->load->view('templates/home/footer',$data, true);

		$this->load->view('templates/home/index',$data);
    }
    public function main()
    {
        $sessMeja               = $this->session->userdata('dataMeja');
        $data['meja']           = $sessMeja['no_meja'];
        $data['nama_pelanggan'] = $sessMeja['nama_customer'];
        $data['email']          = $sessMeja['email'];
        $data['no_hp']          = $sessMeja['no_hp'];
        $data['title']          = 'Welcome';
        $data['countcart']      = Cart::where('meja',$this->session->userdata('meja'))->count(); 
		$data['header']         = $this->load->view('templates/home/header',$data, true);
        $data['content']        = $this->load->view('home/main',$data, true);
        $data['footer']         = $this->load->view('templates/home/footer',$data, true);

		$this->load->view('templates/home/index',$data);
    }
    public function cart()
    {
        $sessMeja               = $this->session->userdata('dataMeja');
        $data['meja']           = $sessMeja['no_meja'];
        $data['nama_pelanggan'] = $sessMeja['nama_customer'];
        $data['email']          = $sessMeja['email'];
        $data['no_hp']          = $sessMeja['no_hp'];
        $data['title']          = 'Welcome';
        $data['countcart']      = Cart::where('meja',$this->session->userdata('meja'))->count();
        $data['cart']           = Cart::where('meja',$this->session->userdata('meja'))->get();
		$data['header']         = $this->load->view('templates/home/header',$data, true);
        $data['content']        = $this->load->view('home/cart',$data, true);
        $data['footer']         = $this->load->view('templates/home/footer',$data, true);

		$this->load->view('templates/home/index',$data);
    }


    public function order()
    {
        $id_menu = $this->input->post('id_menu');
        $qty = $this->input->post('qty');
        $notes = $this->input->post('notes');
        if($qty<1){
            echo '<script>alert("jumlah pesanan minimum 1"); window.location = "'.base_url().'home/menu";</script>';
        }else{
            $cek      = Cart::where('meja',$this->session->userdata('meja'))->count();
            $checkCart = Cart::where('meja',$this->session->userdata('meja'))->get();
            if($cek>0){
                foreach($checkCart as $key=>$value):
                    if($value->id_menu == $id_menu){
                        echo '<script>alert("menu sudah masuk cart, silahkan update di cart untuk jumlah atau notes pesanan"); window.location = "'.base_url().'home/menu";</script>';
                    }else{
                        $dataCart = array(
                            'id_menu'   => $id_menu,
                            'meja'      => $this->session->userdata('meja'),
                            'qty'       => $qty,
                            'notes'     => $notes
                        );
                        $postCart = Cart::create($dataCart);
                        if($postCart){
                            redirect(base_url().'home/menu');
                        }else{
                            echo '<script>alert("error"); window.location = "'.base_url().'home/menu";</script>';
                        }
                    }
                endforeach;
            }else{
                $dataCart = array(
                    'id_menu'   => $id_menu,
                    'meja'      => $this->session->userdata('meja'),
                    'qty'       => $qty,
                    'notes'     => $notes
                );
                $postCart = Cart::create($dataCart);
                if($postCart){
                    redirect(base_url().'home/menu');
                }else{
                    echo '<script>alert("error"); window.location = "'.base_url().'home/menu";</script>';
                }
            }
        }
    }

    public function update()
    {
        $id_menu = $this->input->post('id_menu');
        $qty = $this->input->post('qty');
        $notes = $this->input->post('notes');
        if($qty>0){
                $data = array(
                'qty'       => $qty,
                'notes'     => $notes
            );
            $update = Cart::where('meja', $this->session->userdata('meja'))
                            ->where('id_menu',$id_menu)
                            ->update($data);
            if($update){
                redirect(base_url().'home/cart');
            }else{
                echo '<script>alert("error"); window.location = "'.base_url().'home/cart";</script>';
            }
        }else if($qty<0){
            echo '<script>alert("jumlah pesanan minimum 1"); window.location = "'.base_url().'home/cart";</script>';
        }else if($qty==0){
            $delete = Cart::where('meja', $this->session->userdata('meja'))
                            ->where('id_menu',$id_menu)
                            ->delete();
            if($delete){
                redirect(base_url().'home/cart');
            }else{
                echo '<script>alert("error"); window.location = "'.base_url().'home/cart";</script>';
            }
            echo '<script>alert("pesanan dihapus"); window.location = "'.base_url().'home/cart";</script>';
        }
            
    }

    public function checkout()
    {
        $dataCart   = Cart::where('meja', $this->session->userdata('meja'))
                          ->get();
        $sessMeja   = $this->session->userdata('dataMeja');
        foreach($dataCart as $key=>$value){
            $checkout = array(
                'meja'      => $this->session->userdata('meja'),
                'id_menu'   => $value->id_menu,
                'qty'       => $value->qty,
                'notes'     => $value->notes,
                'nama_customer' => $sessMeja['nama_customer'],
                'email'     => $sessMeja['email'],
                'no_hp'     => $sessMeja['no_hp'],
                'status'    => 'ordered'
            );
            Transaksi::create($checkout);
        }
        Cart::where('meja', $this->session->userdata('meja'))
                          ->delete();
        echo '<script>alert("Order sukses, silahkan cek pesanan di menu Check"); window.location = "'.base_url().'home/main";</script>';
    }

    public function check()
    {
        $sessMeja               = $this->session->userdata('dataMeja');
        $data['meja']           = $sessMeja['no_meja'];
        $data['nama_pelanggan'] = $sessMeja['nama_customer'];
        $data['email']          = $sessMeja['email'];
        $data['no_hp']          = $sessMeja['no_hp'];
        $data['title']          = 'Welcome';
        $data['countcart']      = Cart::where('meja',$this->session->userdata('meja'))->count();
        $data['cart']           = Transaksi::where('meja',$this->session->userdata('meja'))->get();
		$data['header']         = $this->load->view('templates/home/header',$data, true);
        $data['content']        = $this->load->view('home/check',$data, true);
        $data['footer']         = $this->load->view('templates/home/footer',$data, true);

		$this->load->view('templates/home/index',$data);
    }

    public function status()
    {
        if(isset($_POST['id_transaksi']))
        {
            
            $data['title']          = 'Welcome';
            $dataTransaksi          = Transaksi::where('id_transaksi',$this->input->post('id_transaksi'))->get();
            $data['menu']           = Menu::where('id_menu', $dataTransaksi[0]['id_menu'])->get();
            $data['transaksi']      = $dataTransaksi;
            $data['header']         = $this->load->view('templates/home/header',$data, true);
            $data['content']        = $this->load->view('home/status',$data, true);
            $data['footer']         = $this->load->view('templates/home/footer',$data, true);

            $this->load->view('templates/home/index',$data);
        }else{
            redirect(base_url().'home/check');
        }
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
