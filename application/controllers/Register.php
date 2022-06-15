<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->model('M_User', 'm_user');
		// if($this->session->userdata('masuk_sistem_rekam') != TRUE){
		// 		$url=base_url('login');
		// 		redirect($url);
		// }
	}

	public function index()
	{
        $this->data['title_web'] = 'Register Akun | Sistem Informasi Klinik';
        $this->load->view('register_view',$this->data);
	}
	
	
	public function prosesregister()
	{		
		$username = $this->input->post('username');
		$password =  $this->input->post('password');
		$email	  = $this->input->post('email');
		
		$id_user = $this->m_user->cekkode();
		// $id_user = $this->db->insert_id();
			$data = array(
				'id_user'=> $id_user,
				'nama'=> $this->input->post('nama'), 
				'username'=> $this->input->post('username'), 
				'password' => md5($this->input->post('password')),
				'email'=> $this->input->post('email'), 
				'level' => 'pasien',
				'status_user' => '0'
			);

		$this->m_user->insert_user($data);

			$config['useragent'] = 'Codeigniter';
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			// $config['smtp_crypto'] = 'ssl';
			$config['smtp_user'] = 'e31190320@student.polije.ac.id';
			$config['smtp_pass'] = 'e31190320';
			$config['mailtype'] = 'html';
			$config['charset']   = 'utf-8';
			$config['newline'] = "\r\n";

			// Load library email dan konfigurasinya
			$this->load->library('email', $config);

			// Email dan nama pengirim
			$this->email->from('e31190320@student.polije.ac.id', 'Sindi Fariha');

			// Email penerima
			$this->email->to(''.$email); // Ganti dengan email tujuan
			// Subject email
			$this->email->subject('Aktivasi Akun');
			// var_dump($id_user);
			// die;

			$message =  "
			<html>
			<head>
			<title>Verifikasi Akun</title>
			<style>
			button {
			font-family: sans-serif;
			font-size: 15px;
			background: #22a4cf;
			color: white;
			border: white 3px solid;
			border-radius: 5px;
			padding: 12px 20px;
			margin-top: 10px;
			}

			button:hover {
			opacity: 0.9;
			}
			</style>
			</head>
			<body>
			<div style='background:#f2f2f2;font-family:arial,sans-serif;'>
			<div style='width:90%;max-width:600px;margin:auto;padding:20px 0 50px 0;box-sizing:border-box;'>
			<div
			style='background:#007BFF;padding:12px;text-align:center;width:100%;border-radius:8px 8px 0 0;box-sizing:border-box;'>
			</div>
			<div style='padding:20px;background:#fff;border:1px solid #e8e8e8;width:100%;box-sizing:border-box;'>
			<b>Hallo</b><br />Terima Kasih Sudah Mendaftar di Klinik Ketapanrame
			<p>Berikut ini username dan password akun anda <br />
			username :'".$username."'<br />
			password :'".$password."'
			<p>
			'Silahkan Klik Aktivasi Akun anda terlebih dahulu'
			<p>
			<center><a href='".base_url('Register/aktivasi/')."".$id_user."'>
			<button class='button'>Aktivasi Akun</button></a>
			</center>
			</p>
			</div>
			<div
			style='background:#e8e8e8;border:1px solid #e8e8e8;color:#939598;padding:16px 24px;text-align:center;width:100%;border-radius:0 0 8px 8px;box-sizing:border-box;'>
			<small>Pesan dibuat otomatis dan dikirimkan oleh sistem
			Klinik Ketapanrame, semua balasan yang ditujukan ke alamat email ini tidak akan kami
			respon, untuk menghubungi Admin kami silahkan kirimkan email ke <a
			href='mailto:kliniketapanrame@gmail.com'>
			kliniketapanrame@gmail.com
			</a>.
			<p />
			<b>Klinik Ketapanrame &copy;
			</b>
			</small>
			</div>
			</div>
			</div>
			</body>
			</html>
			";
			// Isi email
			$this->email->message($message);
			$this->email->send();
				
			// if ($result > 0) {
			// $out['status'] = 'berhasil';
			// } else {
			// $out['status'] = 'gagal';
			// }

		echo '<script>alert("Register Berhasil");
		window.location="'.base_url().'login"</script>';
	}

	public function aktivasi($id){
		$data2 = array(
			'status_user' => '1'
		);
		$id;
		$where = array(
			'id_user' => $id
		);
		
		$result = $this->m_user->update_aktivasi($data2,$where);

		// var_dump($result);
		// die;
		
		if ($result > 0) {
			echo '<script>alert("Aktivasi Berhasil");
		window.location="'.base_url().'home"</script>';
		} else {
			echo 'Gagal Aktivasi';
		}
	}

}