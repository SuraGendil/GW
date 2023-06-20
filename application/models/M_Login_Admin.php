<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login_Admin extends CI_Model 
{
    function cek_login($where)
    {
        return $this->db->get_where('t_admin', $where);   
    }

    function getAdmin($username){
        $this->db->select('id_admin','username', 'moto_admin', 'Role', 'jenis_kelamin', 'email', 'hak_akses');

        $this->db->from('t_admin');
        $this->db->where('username', $username);
		$query = $this->db->get();

        return $query->row();

    }
}
?>
