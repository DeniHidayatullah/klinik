<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_Admin');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Dashboard ';
		$this->data['count_pengguna']=$this->db->query("SELECT * FROM tbl_login")->num_rows();
		$this->data['count_buku']=$this->db->query("SELECT * FROM tbl_buku")->num_rows();
		$this->data['count_pinjam']=$this->db->query("SELECT * FROM tbl_pinjam WHERE status = 'Dipinjam'")->num_rows();
		$this->data['count_kembali']=$this->db->query("SELECT * FROM tbl_pinjam WHERE status = 'Di Kembalikan'")->num_rows();
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/sidebar_view',$this->data);
		$this->load->view('dashboard_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}

}