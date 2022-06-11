<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');
class M_Obat extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika user belum login
	 }

   public $table_obat = 'tbl_obat';
    public $kode_obat = 'kode_obat';
    public $order_obat = 'ASC';

    function get_all_obat()
    {
        $this->db->order_by($this->kode_obat, $this->order_obat);
        return $this->db->get($this->table_obat)->result();
    }
    function get_by_id_obat($id)
    {
        $this->db->where($this->kode_obat, $id);
        return $this->db->get($this->table_obat)->result();
    }

    function insert_obat($data)
    {
        $this->db->insert($this->table_obat, $data);
    }
    function update_obat($id, $data)
    {
        $this->db->where($this->kode_obat, $id);
        $this->db->update($this->table_obat, $data);
    }
    function delete_obat($id)
    {
        $this->db->where($this->kode_obat, $id);
        $this->db->delete($this->table_obat);
    }

}
?>