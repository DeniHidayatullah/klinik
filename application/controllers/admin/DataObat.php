<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataObat extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
     $this->load->model('M_Obat', 'm_obat');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	 
	public function index()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['data_obat'] =  $this->m_obat->get_all_obat();
		$this->data['title_web'] = 'Data Obat';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('admin/dataobat',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	
	}

	public function tambah()
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['data_obat'] =  $this->m_obat->get_all_obat();
		$this->data['title_web'] = 'Tambah Data Obat';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('admin/tambahdataobat',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	public function prosestambah()
	{		
		$id = $this->session->userdata('ses_id');
			$data = array(
				'kode_obat'=> $this->input->post('kode_obat'), 
				'nama_obat'=> $this->input->post('nama_obat'), 
				'untuk_sakit' => $this->input->post('untuk_sakit'),
				'harga'=> $this->input->post('harga'), 
				'stok' => $this->input->post('stok')
			);

		$this->m_obat->insert_obat($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Tambah Data Berhasil</h6>
        </div>');
		
		redirect(site_url('admin/dataobat'));
	}
	
	public function edit($id)
	{	
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['data_obat'] =  $this->m_obat->get_by_id_obat($id);
		// var_dump($this->data['data_obat']);
		// die;
		$this->data['title_web'] = 'Edit Data Obat';
		$this->load->view('template_admin/header_view',$this->data);
		$this->load->view('template_admin/sidebar_view',$this->data);
		$this->load->view('template_admin/topbar_view',$this->data);
		$this->load->view('admin/editdataobat',$this->data);
		$this->load->view('template_admin/footer_view',$this->data);
	}

	public function prosesedit()
	{		
		// $id = $this->input->post('kode_obat');
		$id = $this->input->post('id', TRUE);
			$data = array(
				'kode_obat'=> $this->input->post('kode_obat'), 
				'nama_obat'=> $this->input->post('nama_obat'), 
				'untuk_sakit' => $this->input->post('untuk_sakit'),
				'harga'=> $this->input->post('harga'), 
				'stok' => $this->input->post('stok')
			);

		$this->m_obat->update_obat($id,$data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h6> <i class="icon fas fa-check"></i>Edit Data Berhasil</h6>
        </div>');
		
		redirect(site_url('admin/dataobat'));
	}

	public function hapus($id)
	{
		$this->data['obat'] = $this->m_obat->get_by_id_obat($id);
			
		$this->m_obat->delete_obat($id);
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus Data Obat !</p>
		</div></div>');
		redirect(base_url('admin/dataobat'));  
		
	}
}