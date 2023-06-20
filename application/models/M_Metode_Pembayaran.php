<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Metode_Pembayaran extends CI_Model {

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('t_metode_pembayaran');
		$this->db->join('t_jenis_status', 't_jenis_status.id_jenis_status = t_metode_pembayaran.status_metode');

		$query = $this->db->get();
        return $query->result();
	}

	public function getAllShow()
	{
		$this->db->select('*');
		$this->db->from('t_metode_pembayaran');
		$this->db->join('t_jenis_status', 't_jenis_status.id_jenis_status = t_metode_pembayaran.status_metode');
		$this->db->where('status_metode', 1);
		$query = $this->db->get();
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

	public function changeStatusHide($id){
		
		$this->db->where('id_metode_pembayaran',$id);
		$this->db->update('t_metode_pembayaran',["status_metode" => 2]);
	}

	public function changeStatusShow($id){
		
		$this->db->where('id_metode_pembayaran',$id);
		$this->db->update('t_metode_pembayaran',["status_metode" => 1]);
	}
}
?>
