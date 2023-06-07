<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Metode_Pembayaran extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_metode_pembayaran');
        return $query->result();
	}
}
?>
