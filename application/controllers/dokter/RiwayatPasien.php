<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPasien extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
     $this->load->model('M_Pasien', 'm_pasien');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['data_pasien'] =  $this->m_pasien->get_riwayat_pasien();
		$this->data['pemberitahuan'] =  $this->m_pasien->get_pemberitahuan();
		$this->data['jumlah_pemberitahuan'] =  $this->m_pasien->get_jumlahpemberitahuan();
		$this->data['title_web'] = 'Daftar Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dokter/riwayatpasien',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	
	}

}