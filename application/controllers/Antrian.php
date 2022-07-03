<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
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
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		
		$this->data['list'] = $this->m_antrian->countAntrian();  
		$this->data['total_antrian'] = $this->m_antrian->getCountAntrian();
		$this->data['sisa_antrian'] = $this->m_antrian->getCountSisaAntrian();
		
		$this->data['title_web'] = 'Antrian Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('antrian/antrian_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	
}