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
		$this -> db -> order_by ('t_pembelian.tgl_pembelian', 'DESC');
		$query = $this->db->get();

        return $query -> result();
	}

	public function getSumJoin(){
		$this->db->select('(SUM(harga_nominal)) AS total_pendapatan');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');

		$query = $this->db->get();

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

        return $query -> result();
	}

	public function getpopulerProduk($id, $blnthn, $lim){
		$this->db->select('*', 'count(nama_produk) AS jumlah_produk');
		$this->db->from('t_pembelian');
		$this->db->join('t_nominal', 't_pembelian.id_nominal = t_nominal.id_nominal');
		$this->db->join('t_produk', 't_nominal.id_produk = t_produk.id_produk');
		$this->db->where('t_produk.id_jenis_produk', $id);
		$this->db->like('tgl_pembelian', $blnthn, 'after');
		$this->db->group_by('nama_produk', 'desc');
		$this->db->limit($lim);
		$query = $this->db->get();

        return $query -> result();

	}
}
?>
