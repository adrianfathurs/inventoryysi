<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
	public function getAll(){
		$query="SELECT b.*,s.* from barangs b,spesifikasi_barang s,barcode bc where bc.id_barang=b.id_barang and s.id_spesifikasi=bc.id_spesifikasi";
		return $this->db->query($query)->result_array();
	}
}