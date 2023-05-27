<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_admin');
        return $query->result();
	}
}
?>
