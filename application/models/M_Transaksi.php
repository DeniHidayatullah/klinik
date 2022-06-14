<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Transaksi extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika pasien belum login
	 }
   public $table_pasien = 'tbl_pasien';
   public $table_transaksi = 'tbl_transaksi';
   public $table_user = 'tbl_user';
   public $id_pasien = 'id_pasien';
   public $id_transaksi = 'id_transaksi';
   public $order_pasien = 'ASC';

   function get_all_transaksi()
   {
       $this->db->order_by($this->id_pasien, $this->order_pasien);
       return $this->db->get($this->table_pasien)->result();
   }

   function get_transaksipasien()
   {
    $data = $this->db->select('*');
    $this->db->from('tbl_transaksi');
    $this->db->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_transaksi.id_pasien', 'left');
    $this->db->order_by($this->id_transaksi, $this->order_pasien);
    return $this->db->get()->result();
   }
   function get_strukpasien($id)
   {
    $data = $this->db->select('*');
    $this->db->from('tbl_transaksi');
    $this->db->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_transaksi.id_pasien', 'left');
    $this->db->where('tbl_transaksi.id_pasien', $id);
    return $this->db->get()->row();
   }

   function get_totaltransaksi()
   {
    $data = $this->db->select('count(id_transaksi) as jumlahtransaksi');
    $this->db->from('tbl_transaksi');
    return $this->db->get()->row();
   }

   function get_pasien()
   {
    $this->db->where('status_pasien', 2);
       $this->db->order_by($this->id_pasien, $this->order_pasien);
       return $this->db->get($this->table_pasien)->result();
   }
   
   function get_by_id_pasien($id)
   {
       $this->db->where($this->id_pasien, $id);
       return $this->db->get($this->table_pasien)->result_array();
   }
   
   function get_by_id_transaksis($id)
   {
       $this->db->where($this->id_pasien, $id);
       return $this->db->get($this->table_pasien)->row();
   }

   function insert_transaksi($data)
   {
       $this->db->insert($this->table_transaksi, $data);
   }

   function update_transaksi($id, $data)
   {
       $this->db->where($this->id_transaksi, $id);
       $this->db->update($this->table_transaksi, $data);
   }
   
   function delete_transaksi($id)
   {
       $this->db->where($this->id_transaksi, $id);
       $this->db->delete($this->table_transaksi);
   }
   
}
?>