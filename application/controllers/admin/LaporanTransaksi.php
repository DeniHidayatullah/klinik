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
		$this->data['username'] = $this->session->userdata('username');
        $this->data['tahun']   = $this->m_transaksi->gettahun();
		$this->data['title_web'] = 'Laporan Transaksi Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('admin/laporantransaksi',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}
	public function laporanbybulan()
	{	
		$tahun1 = htmlspecialchars($this->input->post('tahun1', true));
        $bulanawal1 = htmlspecialchars($this->input->post('bulanawal1', true));
        $bulanakhir = htmlspecialchars($this->input->post('bulanakhir', true));

        $this->data['bybulan'] = $this->m_transaksi->filterbybulan($tahun1, $bulanawal1, $bulanakhir);
		$this->data['sum'] = $this->m_transaksi->sumbulan($tahun1, $bulanawal1, $bulanakhir);
		$this->data['tahun'] = $tahun1;
		$this->data['bulanawal'] = $bulanawal1;
		$this->data['bulanakhir'] = $bulanakhir;
		
		$this->data['title_web'] = 'Laporan Dari Bulan';
		$this->load->view('admin/laporan_by_bulan_penjualan',$this->data);
	}
	public function laporanbytahun()
	{	
        $tahun2 = htmlspecialchars($this->input->post('tahun2', true));
        $this->data['bytahun'] = $this->m_transaksi->filterbytahun($tahun2);
		$this->data['sum'] = $this->m_transaksi->sum($tahun2);
		$this->data['tahun'] = $tahun2;
		$this->data['title_web'] = 'Laporan Dari Tahun';
		$this->load->view('admin/laporan_by_tahun_penjualan',$this->data);
	}
	
}