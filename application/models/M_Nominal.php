<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nominal extends CI_Model {

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('t_nominal');
		$this->db->join('t_produk', 't_produk.id_produk = t_nominal.id_produk');
		$this -> db -> order_by ('t_nominal.id_produk', 'ASC');
		$query = $this->db->get();

        return $query->result();
	}
	public function getById($id)
	{
		$query = $this->db->get_where('t_nominal', array('id_produk' => $id));
        return $query -> result();
	}

	// public function sumterjual($id){
	// 	// $query = $this->db->query("SELECT SUM(terjual_nominal) FROM t_nominal WHERE id_produk = $id");
    //     // return $query -> result();
	// 	$query = $this->db->query("SELECT SUM(t_nominal.terjual_nominal) FROM t_nominal WHERE t_nominal.id_produk = $id");
	// 	return $query;
	// 	// $query = $this->db->get('t_nominal');
	// }
}
?>
