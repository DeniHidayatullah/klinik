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
   function get_pasien()
   {
    $where = "status_pasien=0 OR status_pasien=1";
    $this->db->where($where);
       $this->db->order_by($this->id_pasien, $this->order_pasien);
       return $this->db->get($this->table_pasien)->result();
   }
   function get_riwayat_pasien()
   {
    $this->db->where('status_pasien', 2);
       $this->db->order_by($this->id_pasien, $this->order_pasien);
       return $this->db->get($this->table_pasien)->result();
   }
   
   function get_pemberitahuan()
   {
    $data = $this->db->select('*');
    $this->db->from('tbl_pasien');
    $this->db->where('status_pasien', 0);
    return $this->db->get()->result();
   }
   
   function get_jumlahpemberitahuan()
   {
    $data = $this->db->select('count(id_pasien) as jumlahpasien');
    $this->db->from('tbl_pasien');
    $this->db->where('status_pasien', 0);
    return $this->db->get()->row();
   }
   
   function get_pasienbaru()
   {
    $data = $this->db->select('count(id_pasien) as jumlahpasienbaru');
    $this->db->from('tbl_pasien');
    $this->db->where('status_pasien', 0);
    return $this->db->get()->row();
   }
   
   function get_totalpasien()
   {
    $data = $this->db->select('count(id_pasien) as jumlahpasien');
    $this->db->from('tbl_pasien');
    return $this->db->get()->row();
   }
   
   function get_bulanpasien()
   {
    $query = $this->db->query("SELECT MONTH(tanggal_daftar) AS bulan FROM tbl_pasien Group BY MONTH(tanggal_daftar) ASC")->result();
        return $query;
    }
   function get_perbulanpasien()
   {
    $query = $this->db->query("SELECT COUNT(id_pasien) as totalperbulan FROM tbl_pasien Group BY MONTH(tanggal_daftar) ASC")->result();
        return $query;
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

   function getdi_transaksipasien($id)
   {
    $data = $this->db->select('*');
    $this->db->from('tbl_transaksi');
    $this->db->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_transaksi.id_pasien', 'left');
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