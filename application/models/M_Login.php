<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_admin');
        return $query->result();
	}

	public function getById($id){
		$this->db->select('*');
		$this->db->from('t_admin');
		$this->db->join('t_role', 't_admin.id_role = t_role.id_role');
		$this->db->join('t_jenis_kelamin', 't_admin.id_jenis_kelamin = t_jenis_kelamin.id_jenis_kelamin');
		$this->db->where('id_admin', $id);
		$query = $this->db->get();

		return $query -> row();

	}

	public function getRole($id)
	{
		$this->db->select('*');
		$this->db->from('t_role');
		$this->db->join('t_admin', 't_admin.id_role = t_role.id_role');
		$this->db->where('id_admin', $id);
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}

	public function getJK($id)
	{
		$this->db->select('*');
		$this->db->from('t_jenis_kelamin');
		$this->db->join('t_admin', 't_admin.id_jenis_kelamin = t_jenis_kelamin.id_jenis_kelamin');
		$this->db->where('id_admin', $id);
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}

	
}
?>
