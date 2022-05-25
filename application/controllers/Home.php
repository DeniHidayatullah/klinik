<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_Admin');
	 	//  if($this->session->userdata('masuk_sistem_rekam') != TRUE){
		// 		 $url=base_url('login');
		// 		 redirect($url);
		//  }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Beranda';
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/topbar_view',$this->data);
		$this->load->view('beranda_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}

	public function tentang()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Tentang';
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/topbar_view',$this->data);
		$this->load->view('tentang_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}
	public function pelayanan()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Pelayanan';
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/topbar_view',$this->data);
		$this->load->view('pelayanan_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}

}