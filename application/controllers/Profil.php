<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
     $this->load->model('M_Pasien', 'm_pasien');
     $this->load->model('M_antrian', 'm_antrian');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['username'] = $this->session->userdata('username');
		$id = $this->session->userdata('ses_id');
		
		$this->data['data_pasien'] =  $this->m_user->get_by_id_user($id);
		$this->data['title_web'] = 'Profil User';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('pasien/profil_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	
}