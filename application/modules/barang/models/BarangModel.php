<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
	public const BARANGS="barangs";
	public const SPESIFIKAISI_BARANG="spesifikasi_barang";
	public function getAll(){
		$query="SELECT b.*,s.* from barangs b,spesifikasi_barang s,barcode bc where bc.id_barang=b.id_barang and s.id_spesifikasi=bc.id_spesifikasi";
		return $this->db->query($query)->result_array();
	}
	
//untuk insert di dua table
	public function setTambah($barangs,$spesifikasi)
	{
		$this->db->insert('barangs',$barangs);		
		$this->db->insert('spesifikasi_barang',$spesifikasi);		

	}

//untuk mengambil id terakhir setelah data di insert
public function get_id()
	{
			$query="SELECT id_barang FROM barangs where id_barang IN (SELECT MAX(id_barang) FROM barangs)";
			//return $this->db->query($query)->row_array();
			return $this->db->query($query)->row()->id_barang;
	}

//mengambil data table spesifikasi dan barang berdasarkan id yang diinginkan
	public function getAllbyId($id)
	{
		$query = $this->db->select('b.*, s.* ')
                  ->from('barangs b')
                  ->join('spesifikasi_barang s', 'b.id_barang = s.id_spesifikasi')
                  ->where('b.id_barang',$id)
                  ->get();
                  return $query->result_array();
					
	}


	
}