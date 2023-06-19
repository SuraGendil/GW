<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login_Admin extends CI_Model 
{
    function cek_login($where)
    {
        return $this->db->get_where('t_admin', $where);   
    }

    function getAdmin($username){
        $this->db->select('*');
        $this->db->from('t_admin');
        $this->db->where('username', $username);
		$query = $this->db->get();

        return $query->row();


    }
    // public function login_admin($username, $password)
    // {
    //     $this->db->where('nama_admin', $username);
    //     $this->db->where('pass_admin', $password);
    //     $query = $this->db->get('t_admin');

    //     if ($query->num_rows() == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
?>
