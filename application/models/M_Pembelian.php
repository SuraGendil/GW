<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembelian extends CI_Model {

	public function getAll()
	{
		$query = $this -> db -> get('t_pembelian');
        return $query->result();
	}

	public function insertPembelian($data)
	{
		$this->db->insert('t_pembelian',$data);
	}

	public function getAllJoin()
	{
		$this->db->select('*');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');
		$this->db->join('t_produk', 't_nominal.id_produk = t_produk.id_produk');
		$this->db->join('t_jenis_produk', 't_produk.id_jenis_produk = t_jenis_produk.id_jenis_produk');
		$this->db->join('t_metode_pembayaran', 't_pembelian.id_metode_pembayaran = t_metode_pembayaran.id_metode_pembayaran');
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}

	public function getSumJoin(){
		$this->db->select('(SUM(harga_nominal)) AS total_pendapatan');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');
		// $this->db->join('t_produk', 't_produk.id_jenis_produk = t_jenis_produk.id_jenis_produk');
		// $this->db->join('t_metode_pembayaran', 't_pembelian.id_metode_pembayaran = t_metode_pembayaran.id_metode_pembayaran');
		// $this->db->where('t_produk.id_jenis_produk', 1);
		$query = $this->db->get();

		// $query = $this->db->get_where('t_jenis_produk', array('id_jenis_produk' => $id));
        return $query -> result();
	}
	
	public function getSumProduk($id, $blnthn){
		$this->db->select('(SUM(harga_nominal)) AS total_pendapatan');
		// $this->db->select('COALESCE(total_pendapatan, 0) FROM t_pembelian');
		$this->db->select('(COUNT(harga_nominal)) AS jumlah_dibeli');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');
		$this->db->join('t_produk', 't_nominal.id_produk = t_produk.id_produk');
		$this->db->where('t_produk.id_jenis_produk', $id);
		$this->db->like('tgl_pembelian', $blnthn, 'after');
		$query = $this->db->get();
		// SELECT COALESCE(angka, 0) AS angka FROM coba;
        return $query -> result();
	}

	public function getpopulerProduk($id, $blnthn){
		$this->db->select('nama_produk as terpopuler');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');
		$this->db->join('t_produk', 't_nominal.id_produk = t_produk.id_produk');
		$this->db->where('t_produk.id_jenis_produk', $id);
		$this->db->like('tgl_pembelian', $blnthn, 'after');
		$this->db->limit('1');
		$query = $this->db->get();
		// SELECT COALESCE(angka, 0) AS angka FROM coba;
        return $query -> result();

	}
}
?>
