<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Metode_Pembayaran extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_metode_pembayaran');
        return $query->result();
	}

	public function getById($id)
	{
		$query = $this -> db -> get_where('t_metode_pembayaran', array('id_metode_pembayaran' => $id));
        return $query->row();
	}

	public function insertPembayaran($data){
		$this->db->insert('t_metode_pembayaran',$data);
	}

	public function updatePembayaran($data, $id)
	{
		$this->db->where('id_metode_pembayaran',$id);
		$this->db->update('t_metode_pembayaran',$data);
	}
}
?>
