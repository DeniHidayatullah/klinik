<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->model('M_login');
        
	 }
     
	public function index()
	{
		$this->data['title_web'] = 'Login | Sistem Informasi Klinik';
		$this->load->view('login_view',$this->data);
	}

    public function auth()
    {
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        // auth
        $proses_login = $this->db->query("SELECT * FROM tbl_user  WHERE username='$username' AND password = md5('$password')");
        $row = $proses_login->num_rows();
        $hasil_login = $proses_login->row_array();
        if ($hasil_login['status_user'] == 1) {
            if($row > 0)
            {
                $hasil_login = $proses_login->row_array();
    
                // create session
                $this->session->set_userdata('masuk_sistem_rekam',TRUE);
                $this->session->set_userdata('ses_id',$hasil_login['id_user']);
                $this->session->set_userdata('level',$hasil_login['level']);
                $this->session->set_userdata('username',$hasil_login['username']);
    
            // if($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter'){
            //     echo '<script>window.location="'.base_url().'dashboard";</script>';
            // }
            // elseif($this->session->userdata('level') == 'pasien'){
            //     echo '<script>window.location="'.base_url().'home";</script>';
            // }
            if($hasil_login['level'] == 'pasien'){
            echo '<script>window.location="'.base_url().'antrian";</script>';
            }else{
                echo '<script>window.location="'.base_url().'dashboard";</script>';
            }
            
            }else{
    
                echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password Anda");
                window.location="'.base_url().'login"</script>';
            }
        }else{

            echo '<script>alert("Login Gagal, Periksa Email Anda Untuk Aktivasi");
            window.location="'.base_url().'login"</script>';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>window.location="'.base_url().'";</script>';
    }
}