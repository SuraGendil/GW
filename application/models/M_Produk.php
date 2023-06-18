<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('t_produk');
		$this->db->join('t_jenis_produk', 't_jenis_produk.id_jenis_produk = t_produk.id_jenis_produk');
		$this -> db -> order_by ('t_produk.id_jenis_produk', 'ASC');
		$query = $this->db->get();

        return $query->result();
	}

	public function getById($id)
	{
		$this->db->where('id_produk', $id);
		$query = $this->db->get('t_produk');
        return $query -> row();
	}

	// public function getProdukId($id){
	// 	$this->db->select('*');
	// 	$this->db->from('t_produk');
	// 	$this->db->where('id_produk', $id);
	// 	$query = $this->db->get();
    //     return $query -> result();

	// }

	public function getJenis($id)
	{
		$this->db->select('*');
		$this->db->from('t_jenis_produk');
		$this->db->join('t_produk', 't_produk.id_jenis_produk = t_jenis_produk.id_jenis_produk');
		$this->db->where('id_produk', $id);
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}

	public function updateterjual($id){
		// $this->db->set('terjual_produk', `terjual_produk`+1);
		// $this->db->where('id_produk', $id);
		// $this->db->update('t_produk');
		$this->db->query("UPDATE `t_produk` SET `terjual_produk` = `terjual_produk`+1 WHERE `id_produk` = $id");
	}

	public function getAllJenis()
	{
		$this->db->select('*');
		$this->db->from('t_jenis_produk');
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}

	public function insertProduk($data){
		$this->db->insert('t_produk',$data);
	}

	public function editProduk($data, $id)
	{
		$this->db->where('id_produk',$id);
		$this->db->update('t_produk',$data);
	}
}
?>
