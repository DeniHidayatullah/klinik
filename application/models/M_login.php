<?php
if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Login extends CI_Model
{

  function GET_LOGIN($username,$password)
  {
      $row = $this->db->query("SELECT * FROM tbl_login WHERE username ='$username' AND password = '$password'");
      return $row;
  }

  function insertTable($table_name,$data)
  {
   $tambah = $this->db->insert($table_name,$data);
   return $tambah;
  }

}
?>