<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Data_Admin extends CI_Model 
{
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('t_admin');
		$this->db->join('t_role', 't_role.id_role = t_admin.id_role');
		$this->db->join('t_jenis_kelamin', 't_jenis_kelamin.id_jenis_kelamin = t_admin.id_jenis_kelamin');
		$this -> db -> order_by ('t_admin.id_role', 'ASC');
		$this -> db -> order_by ('t_admin.username', 'ASC');

		$query = $this->db->get();
	
		return $query->result();
	}
	
	public function getById($id)
	{
		$this->db->where('id_admin', $id);
		
		$query = $this->db->get('t_admin');
		
		return $query -> row();
	}
	
	public function getRole($id)
	{
		$this->db->select('*');
		$this->db->from('t_role');
		$this->db->join('t_admin', 't_admin.id_role = t_role.id_role');
		$this->db->where('id_admin', $id);
		
		$query = $this->db->get();
	
		return $query -> result();
	}
	
	public function insertAdmin($data){
		$this->db->insert('t_admin',$data);
	}
	
	public function editAdmin($data, $id)
	{
		$this->db->where('id_admin',$id);
		$this->db->update('t_admin',$data);
	}
	
	public function deleteAdmin($id){
		$this->db->where('id_admin',$id);
		$this->db->delete('t_admin');
	}

	public function updateHakAkses($id_admin, $hak_akses) {
        // Update data admin berdasarkan $id_admin dengan nilai hak akses baru
        $data = array(
            'hak_akses' => $hak_akses
        );
        $this->db->where('id_admin', $id_admin);
        $this->db->update('t_admin', $data);
    }

    public function getAdminById($id_admin) {
        // Ambil data admin berdasarkan $id_admin
        $this->db->where('id_admin', $id_admin);
        return $this->db->get('t_admin')->row();
    }
}
?>