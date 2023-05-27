<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {

	public function getAll()
	{
		$this -> db -> order_by ('id_jenis_produk', 'ASC');
		$query = $this -> db -> get('t_produk');
        return $query->result();
	}
}
?>
