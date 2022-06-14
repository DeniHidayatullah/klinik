<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
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
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
        $this->data['pasien']   = $this->m_transaksi->get_pasien();
		$this->data['pemberitahuan'] =  $this->m_pasien->get_pemberitahuan();
		$this->data['jumlah_pemberitahuan'] =  $this->m_pasien->get_jumlahpemberitahuan();
		$this->data['title_web'] = 'Input Transaksi';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dokter/tambah_transaksi',$this->data);
		// $this->load->view('template_admin/footer_view',$this->data);
	}

	public function get_pasien()
	{
		$id_pasien = $this->input->post('id_pasien',TRUE);
		$data = $this->db->query("SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'");
		$nama_pasien = $data->row()->nama_pasien;
		$tempat = $data->row()->tempat;
		$tanggal_lahir = $data->row()->tanggal_lahir;
		if ($data->row()->jenis_kelamin = 'P') {
			$jenis_kelamin = 'Perempuan';
		} elseif ($data->row()->jenis_kelamin = 'L') {
			$jenis_kelamin = $data->row('Laki-Laki');
		} 
		$no_telp = $data->row()->no_telp;
		$keluhan = $data->row()->keluhan;
		
		$out = array('nama_pasien' => ''.$nama_pasien , 'tempat' => ''.$tempat , 
		'tanggal_lahir' => ''.$tanggal_lahir , 'jenis_kelamin' => ''.$jenis_kelamin , 
		'no_telp' => ''.$no_telp , 'keluhan' => ''.$keluhan);
        echo json_encode($out);
	}

	public function prosestransaksi()
	{	
		$id = $this->session->userdata('ses_id');
		$id_pasien = $this->input->post('id_pasien');
			$data = array(
				'id_pasien'=> $this->input->post('id_pasien'),
				'total'=> $this->input->post('total'), 
				'bayar'=> $this->input->post('bayar'), 
				'kembali'=> $this->input->post('kembali'),
				'tanggal_transaksi'=> date("Y/m/d")
			);

		$this->m_transaksi->insert_transaksi($data);

		echo '<script>
		window.open("'.base_url("dokter/Transaksi/cetaksruk/").$id_pasien.'");</script>';
		echo '<script>alert("Daftar Berhasil");
		window.location="'.base_url().'dokter/Transaksi/riwayattransaksi"</script>';
	}

	public function riwayattransaksi()
	{	
		$id = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
        $this->data['transaksi_pasien']   = $this->m_transaksi->get_transaksipasien();
		$this->data['pemberitahuan'] =  $this->m_pasien->get_pemberitahuan();
		$this->data['jumlah_pemberitahuan'] =  $this->m_pasien->get_jumlahpemberitahuan();
		$this->data['title_web'] = 'Riwayat Transaksi Pasien';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('dokter/riwayattransaksi',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	public function cetaksruk($id)
	{	
        $this->data['transaksi_pasien']   = $this->m_transaksi->get_strukpasien($id);
		// var_dump($this->data['transaksi_pasien']);
		// die;
		$this->load->view('dokter/struk',$this->data);
	}
}