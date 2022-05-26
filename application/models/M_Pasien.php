<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Pasien extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika pasien belum login
	 }
   public $table_pasien = 'tbl_pasien';
   public $table_user = 'tbl_user';
   public $id_pasien = 'id_pasien';
   public $order_pasien = 'ASC';

   function get_all_pasien()
   {
       $this->db->order_by($this->id_pasien, $this->order_pasien);
       return $this->db->get($this->table_pasien)->result();
   }
   function get_by_id_pasien($id)
   {
       $this->db->where($this->id_pasien, $id);
       return $this->db->get($this->table_pasien)->row();
   }
   function get_by_id_user($id)
   {
    $data = $this->db->select('*');
    $this->db->from('tbl_pasien');
    $this->db->join('tbl_user', 'tbl_pasien.id_user = tbl_user.id_user', 'left');
    $this->db->where('tbl_user.id_user', $id);
    return $this->db->get()->result();
   }

   function insert_pasien($data)
   {
       $this->db->insert($this->table_pasien, $data);
   }
   function update_pasien($id, $data)
   {
       $this->db->where($this->id_pasien, $id);
       $this->db->update($this->table_pasien, $data);
   }
   function delete_pasien($id)
   {
       $this->db->where($this->id_pasien, $id);
       $this->db->delete($this->table_pasien);
   }

   function update_password($id, $data)
   {
       $this->db->where('pasien_id', $id);
       $this->db->update('tb_pasien', $data);
   }

   function insert($data)
   {
       $this->db->insert($this->table, $data);
   }
}
?>