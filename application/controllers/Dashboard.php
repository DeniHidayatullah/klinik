<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User');
     $this->load->model('M_Pasien', 'm_pasien');
     $this->load->model('M_Transaksi', 'm_transaksi');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['pemberitahuan'] =  $this->m_pasien->get_pemberitahuan();
		$this->data['jumlah_pemberitahuan'] =  $this->m_pasien->get_jumlahpemberitahuan();
		$this->data['pasienbaru'] =  $this->m_pasien->get_pasienbaru();
		$this->data['totaltransaksi'] =  $this->m_transaksi->get_totaltransaksi();
		$this->data['totalpasien'] =  $this->m_pasien->get_totalpasien();
		$this->data['bulanpasien'] =  $this->m_pasien->get_bulanpasien();
		$this->data['perbulanpasien'] =  $this->m_pasien->get_perbulanpasien();
		$this->data['bulantransaksi'] =  $this->m_transaksi->get_bulantransaksi();
		$this->data['perbulantransaksi'] =  $this->m_transaksi->get_perbulantransaksi();
		// var_dump($this->data['bulanpasien']);
		// die;
		$this->data['title_web'] = 'Dashboard ';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dashboard_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

}