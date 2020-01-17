<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public const BARANGS="barangs";
	public const SPESIFIKAISI_BARANG="spesifikasi_barang";
	public const barcode="spesifikasi_barang";
	

	public function getAllbyIdbarcode($id){
		$query="SELECT b.*,s.*,bc.*,dept.*,yas.* from barcode bc 
		inner join spesifikasi_barang s on s.id_spesifikasi=bc.id_spesifikasi
	 	inner join barangs b on  b.id_barang=bc.id_barang 
	 	inner join departement dept on  dept.id_departement=bc.id_departement
	 	inner join yayasan yas on  yas.id_yayasan=bc.id_yayasan
	 	where bc.id_barcode='$id'";
		return $this->db->query($query)->result_array();
	}

	}