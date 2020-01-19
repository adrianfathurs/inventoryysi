<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public const BARANGS="barangs";
	public const SPESIFIKAISI_BARANG="spesifikasi_barang";
	public const barcode="spesifikasi_barang";
	public const ttransaksi="ttransaksi";
	public const data_transaksi="data_transaksi";

	//insert tables transaksi dari viewtransaksi barang
	public function setTambahttransaksi($transaksi)
	{
		$this->db->insert('ttransaksi',$transaksi);
	}

	//insert tables data transaksi dengan mengambil id_transaksi terakhir

	public function setTambahdatatransaksi($datatransaksi)
	{
		$this->db->insert('data_transaksi',$datatransaksi);	
	}

	//untuk mengambil data semua table barcode,spesifikasi barang,departement,barangs,dan yayasan berdasarkan id yang diselect
	public function getAllbyIdbarcode($id){
		$query="SELECT b.*,s.*,bc.*,dept.*,yas.* from barcode bc 
		inner join spesifikasi_barang s on s.id_spesifikasi=bc.id_spesifikasi
	 	inner join barangs b on  b.id_barang=bc.id_barang 
	 	inner join departement dept on  dept.id_departement=bc.id_departement
	 	inner join yayasan yas on  yas.id_yayasan=bc.id_yayasan
	 	where bc.id_barcode='$id'";
		return $this->db->query($query)->result_array();
	}
	//
	

	//untuk mengambil id_transaksi terakhir setelah data di insert
public function get_idtransaksi()
	{
			$query="SELECT id_transaksi FROM ttransaksi where id_transaksi IN (SELECT MAX(id_transaksi) FROM ttransaksi)";
			//return $this->db->query($query)->row_array();
			return $this->db->query($query)->row()->id_transaksi;
	}

}