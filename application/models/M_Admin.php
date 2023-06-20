<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_admin');
        return $query->result();
	}

	public function insertAdmin($data){
		$this->db->insert('t_admin', $data);
	}

	public function updateAdmin($data, $id)
	{
		$this->db->where('id_admin',$id);
		$this->db->update('t_admin',$data);
	}
}
?>
