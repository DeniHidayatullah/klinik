<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Antrian extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika pasien belum login
	 }
	 
	 public $table_antrian = 'tbl_antrian';
	 public $id_antrian = 'id_antrian';
	 public $order_pasien = 'ASC';
     
     public function countAntrian($daftar = false){

		$date = date('Y-m-d');

		$this->db->select('antrian,tanggal');
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status != 1');
		if($daftar){
			$this->db->order_by('antrian','desc');	
		}else{
			$this->db->order_by('antrian','asc');
		}
		
		
		$this->db->order_by('tanggal','desc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;	
		}
	}

    function getCountAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	function getCountSisaAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status','0');
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	public function insertAntrian($data){
		$this->db->insert('tbl_antrian',$data);
		 return $this->db->insert_id();
	}

	function update_antrian($id, $data)
   {
       $this->db->where($this->id_antrian, $id);
       $this->db->update($this->table_antrian, $data);
   }
}
?>