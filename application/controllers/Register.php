<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
		// if($this->session->userdata('masuk_sistem_rekam') != TRUE){
		// 		$url=base_url('login');
		// 		redirect($url);
		// }
	}

	public function index()
	{
        $this->data['title_web'] = 'Register Akun | Sistem Informasi Klinik';
        $this->load->view('register_view',$this->data);
	}
	
	
	public function prosesregister()
	{		
			$data = array(
				'nama'=> $this->input->post('nama'), 
				'username'=> $this->input->post('username'), 
				'password' => md5($this->input->post('password')),
				'email'=> $this->input->post('email'), 
				'level' => 'pasien'
			);

		$this->m_user->insert_user($data);

		echo '<script>alert("Register Berhasil");
		window.location="'.base_url().'login"</script>';
	}

}