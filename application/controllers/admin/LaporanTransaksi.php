<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanTransaksi extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
     $this->load->model('M_Pasien', 'm_pasien');
     $this->load->model('M_Transaksi', 'm_transaksi');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$id = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
        $this->data['transaksi_pasien']   = $this->m_transaksi->get_transaksipasien();
		$this->data['title_web'] = 'Riwayat Transaksi Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('admin/riwayattransaksi',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}
}