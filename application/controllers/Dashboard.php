<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['title_web'] = 'Dashboard ';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dashboard_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

}