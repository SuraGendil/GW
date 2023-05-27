<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembelian extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_pembelian');
        return $query->result();
	}
}
?>
