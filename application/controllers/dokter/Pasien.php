<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
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
		$this->data['data_pasien'] =  $this->m_pasien->get_pasien();
		$this->data['pemberitahuan'] =  $this->m_pasien->get_pemberitahuan();
		$this->data['jumlah_pemberitahuan'] =  $this->m_pasien->get_jumlahpemberitahuan();
		$this->data['title_web'] = 'Daftar Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dokter/pasien',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	
	}

	public function proseskonfirmasi($id)
	{		
			$data = array(
				'status_pasien' => '1'
			);

			$this->m_pasien->update_pasien($id,$data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			<h6> <i class="icon fas fa-check"></i>Data Pasien Sudah Terkonfirmasi</h6>
			</div>');
			
			redirect(site_url('dokter/pasien'));
	}

	public function prosesselesai($id)
	{		
			
		$pasien =  $this->m_pasien->get_by_pasien($id);
		$id_antrian = $pasien->id_antrian;
			$data = array(
				'status_pasien' => '2'
			);

			$data2 = array(
				'status' => '1'
			);
			$this->m_pasien->update_pasien($id,$data);
			
			$this->m_antrian->update_antrian($id_antrian,$data2);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			<h6> <i class="icon fas fa-check"></i>Pasien Telah Selesai Diperiksa</h6>
			</div>');
			
			redirect(site_url('dokter/riwayatpasien'));
	}

}