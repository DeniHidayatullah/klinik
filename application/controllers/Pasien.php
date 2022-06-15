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
		$this->data['username'] = $this->session->userdata('username');
		$this->data['title_web'] = 'Daftar Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('pasien/daftar_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	public function prosesdaftar()
	{	
		$id = $this->session->userdata('ses_id');
		// setting konfigurasi upload
		$nmfile = "user_".time();
		$config['upload_path'] = './assets/SyaratPasien/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);
		// upload gambar 1
		$this->upload->do_upload('syarat_daftar');
		$result1 = $this->upload->data();
		$result = array('syarat_daftar'=>$result1);
		$data1 = array('upload_data' => $this->upload->data());
			$data = array(
				'nama_pasien'=> $this->input->post('nama_pasien'), 
				'tempat'=> $this->input->post('tempat'), 
				'tanggal_lahir'=> $this->input->post('tanggal_lahir'), 
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'keluhan' => $this->input->post('keluhan'),
				'no_telp'=> $this->input->post('no_telp'),
                'syarat_daftar'=>$data1['upload_data']['file_name'], 
				'id_user' => $id,
				'status_pasien' => '0',
				'tanggal_daftar' => date("Y/m/d")
			);

		$this->m_pasien->insert_pasien($data);

		echo '<script>alert("Daftar Berhasil");
		window.location="'.base_url().'Pasien/riwayatpemeriksaan"</script>';
	}

	public function riwayatpemeriksaan()
	{	
		$id = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['data_pasien'] =  $this->m_pasien->get_by_id_user($id);
		$this->data['title_web'] = 'Riwayat Pemeriksaan Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('pasien/riwayatpemeriksaan_view',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}
}