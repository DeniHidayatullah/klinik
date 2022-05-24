<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_Obat', 'm_obat');
		if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['obat'] =  $this->m_obat->get_all_obat();
        $this->data['title_web'] = 'Data Obat';
        $this->load->view('template/header_view',$this->data);
        $this->load->view('template/sidebar_view',$this->data);
        $this->load->view('obat/obat_view',$this->data);
        $this->load->view('template/footer_view',$this->data);
	}
	
	public function obattambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Tambah obat';
        $this->load->view('template/header_view',$this->data);
        $this->load->view('template/sidebar_view',$this->data);
        $this->load->view('obat/tambah_view',$this->data);
        $this->load->view('template/footer_view',$this->data);
	}
	
	public function prosestambah()
	{		
			$data = array(
				'kode_obat'=> $this->input->post('kode_obat'), 
				'nama_obat' => $this->input->post('nama_obat'), 
				'harga' => $this->input->post('harga'), 
				'stok'  => $this->input->post('stok'), 
				'qty'=> $this->input->post('qty'),
				'tgl_masuk' => date('Y-m-d')
			);

		$this->db->insert('tbl_obat', $data);

		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
		<p> Tambah Data Obat Berhasil !</p>
		</div></div>');
		redirect(base_url('data')); 
	}
	
	public function obatedit($id)
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['obat'] = $this->m_obat->get_by_id_obat($id);
		$this->data['title_web'] = 'Data Obat Edit';
        $this->load->view('template/header_view',$this->data);
        $this->load->view('template/sidebar_view',$this->data);
        $this->load->view('obat/edit_view',$this->data);
        $this->load->view('template/footer_view',$this->data);
	}

	public function prosesedit()
	{
		$id = $this->input->post('id', TRUE);
		// var_dump($id);
		// die;
			$data = array(
				'kode_obat'=> $this->input->post('kode_obat' , TRUE), 
				'nama_obat' => $this->input->post('nama_obat'), 
				'harga' => $this->input->post('harga'), 
				'stok'  => $this->input->post('stok'), 
				'qty'=> $this->input->post('qty'),
				'tgl_masuk' => date('Y-m-d')
			);

			$this->m_obat->update_obat($id, $data);
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Data Obat Berhasil !</p>
			</div></div>');
			redirect(base_url('data')); 
	}

	public function obathapus($id)
	{
		
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['obat'] = $this->m_obat->get_by_id_obat($id);
			
		$this->m_obat->delete_obat($id);
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus Data Obat !</p>
		</div></div>');
		redirect(base_url('data'));  
		
	}


}