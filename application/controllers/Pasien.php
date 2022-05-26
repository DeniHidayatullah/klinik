<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
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
		$this->data['title_web'] = 'Daftar Pasien';
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/topbar_view',$this->data);
		$this->load->view('pasien/daftar_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}

	public function prosesdaftar()
	{		
		$id = $this->session->userdata('ses_id');
			$data = array(
				'nama_pasien'=> $this->input->post('nama_pasien'), 
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'usia_pasien'=> $this->input->post('usia_pasien'), 
				'gejala_pasien' => $this->input->post('gejala_pasien'),
				'no_telp'=> $this->input->post('no_telp'), 
				'id_user' => $id,
				'status_pasien' => '0'
			);

		$this->m_pasien->insert_pasien($data);

		echo '<script>alert("Daftar Berhasil");
		window.location="'.base_url().'Pasien/riwayatpemeriksaan"</script>';
	}

	public function riwayatpemeriksaan()
	{	
		$id = $this->session->userdata('ses_id');
		$this->data['data_pasien'] =  $this->m_pasien->get_by_id_user($id);
		$this->data['title_web'] = 'Riwayat Pemeriksaan Pasien';
		$this->load->view('template/header_view',$this->data);
		$this->load->view('template/topbar_view',$this->data);
		$this->load->view('pasien/riwayatpemeriksaan_view',$this->data);
		$this->load->view('template/footer_view',$this->data);
	}
}