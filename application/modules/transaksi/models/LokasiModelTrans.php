<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiModelTrans extends CI_Model {

	
	 //untuk mengambil data dari table lokasi by id_lokasi
	 public function getlokasidetail($id)
	 {
	 	$query=$this->db->select('d.detail_nama_ruangan,d.id_detail_ruangan')
	 					->from('detail_ruangan d')
	 					->where('d.id_lokasi',$id)
	 					->get();
	 	return $query->result_array();
	 }
//untuk mengmabil data detainamaruangan dari tabel detail ruangan by id_detail_ruangan
	 public function getdetailruangan($id)
	 {
	 	$query=$this->db->select('d.detail_nama_ruangan')
	 					->from('detail_ruangan d')
	 					->where('d.id_detail_ruangan',$id)
	 					->get();
	 	return $query->row()->detail_nama_ruangan;
	 }
//untuk mengambil data nama_lokasi dari tabel lokasi by id_lokasi
	 public function getnamalokasi($idlok)
	 {
	 	$query=$this->db->select('l.nama_lokasi')
	 					->from('lokasi l')
	 					->where('l.id_lokasi',$idlok)
	 					->get();
	 	return $query->row()->nama_lokasi;	
	 }
}