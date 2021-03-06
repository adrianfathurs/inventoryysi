<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
	public const BARANGS="barangs";
	public const SPESIFIKAISI_BARANG="spesifikasi_barang";
	public const barcode="spesifikasi_barang";
	


//untuk insert di dua table
	public function setTambah($barangs,$spesifikasi)
	{
		$this->db->insert('barangs',$barangs);		
		$this->db->insert('spesifikasi_barang',$spesifikasi);		

	}
//insert table barcode
	public function setBarcode($barcode)
	{
		$this->db->insert('barcode',$barcode);
	}

//delete data di table barangs dan spesifikasi
	public function setDelete($id_barang)
	{
		//delete data menurut id ditabel barangs
		$this->db->where('id_barang',$id_barang);
		$this->db->delete('barangs');
		//delete data menurut id ditabel spesifikasi
		$this->db->where('id_spesifikasi',$id_barang);
		$this->db->delete('spesifikasi_barang');

	} 
//setupdate table Barangs
	public function setUpdateBarangs ($barangs,$id_barang)
	{
		return $this->db->where('id_barang',$id_barang)
		->update('barangs',$barangs);
	}
//setupdate data keterangan barang
	public function setupdateket($array,$where)
	{
		return $this->db->where($where)
		->update('barangs',$array);
	}
//setupdate digunakan untuk mengupdate tanggla rusak dan keadaan barang berdasarkan id_barang
	public function setUpdateku($array,$where)
	{

		return $this->db->where($where)
		->update('barangs',$array);
		

	}
//delete id_data_transaksi
	public function setDeleteIdDataTransaksi($id)
	{
		$this->db->where('id_barcode',$id);
		$this->db->delete('data_transaksi');
	}

//delete data pada table barcode berdasarkan id barcode yang telah di select
	public function setDeleteIdBarcode($id)
	{
		$this->db->where('id_barcode',$id);
		$this->db->delete('barcode');
	}	

//function buat menampilkan di view daftar barang
	public function getAll(){
		$query="SELECT b.*,s.*,bc.* from barangs b,spesifikasi_barang s,barcode bc where bc.id_barang=b.id_barang and s.id_spesifikasi=bc.id_spesifikasi";
		return $this->db->query($query)->result_array();
	}
//function buat menampilkan di view cetak surat serahterima 	
	public function getAllbyIdbarcode($id){
		$query="SELECT b.*,s.*,bc.*,dept.*,yas.* from barcode bc 
		inner join spesifikasi_barang s on s.id_spesifikasi=bc.id_spesifikasi
		inner join barangs b on  b.id_barang=bc.id_barang 
		inner join departement dept on  dept.id_departement=bc.id_departement
		inner join yayasan yas on  yas.id_yayasan=bc.id_yayasan
		where bc.id_barcode='$id'";
		return $this->db->query($query)->result_array();
	}
//function buat menampilkan di view cetak surat serahterima 	
	public function getAllbyIdbarcodewherein(array $where){
		/*$query="SELECT b.*,s.*,bc.*,dept.*,yas.* from barcode bc 
		inner join spesifikasi_barang s on s.id_spesifikasi=bc.id_spesifikasi
	 	inner join barangs b on  b.id_barang=bc.id_barang 
	 	inner join departement dept on  dept.id_departement=bc.id_departement
	 	inner join yayasan yas on  yas.id_yayasan=bc.id_yayasan
	 	where_in bc.id_barcode='$id'";
	 	return $this->db->query($query)->result_array();*/


	 	$query = $this->db->select('b.*, s.* ,bc.* ,dept.* ,yas.*')
	 	->from('barcode bc')
	 	->join('spesifikasi_barang s', 'bc.id_spesifikasi = s.id_spesifikasi')
	 	->join('barangs b', 'b.id_barang = bc.id_barang')
	 	->join('departement dept', 'dept.id_departement = bc.id_departement')
	 	->join('yayasan yas', 'yas.id_yayasan = bc.id_yayasan')
	 	->where_in('bc.id_barcode',$where)
	 	->get();
	 	return $query->result_array();



	 }
	 //function buat menampilkan di view cetak surat serahterima 	
	public function getAllbyIdbarcodewhere($where){
		/*$query="SELECT b.*,s.*,bc.*,dept.*,yas.* from barcode bc 
		inner join spesifikasi_barang s on s.id_spesifikasi=bc.id_spesifikasi
	 	inner join barangs b on  b.id_barang=bc.id_barang 
	 	inner join departement dept on  dept.id_departement=bc.id_departement
	 	inner join yayasan yas on  yas.id_yayasan=bc.id_yayasan
	 	where_in bc.id_barcode='$id'";
		return $this->db->query($query)->result_array();*/


		$query = $this->db->select('b.*, s.* ,bc.* ,dept.* ,yas.*')
                  ->from('barcode bc')
                  ->join('spesifikasi_barang s', 'bc.id_spesifikasi = s.id_spesifikasi')
                  ->join('barangs b', 'b.id_barang = bc.id_barang')
                  ->join('departement dept', 'dept.id_departement = bc.id_departement')
                  ->join('yayasan yas', 'yas.id_yayasan = bc.id_yayasan')
                  ->where('bc.id_barcode',$where)
                  ->get();
                  return $query->result_array();



	}
//function untuk mendapatkan id_barang dan spesifikasi melalui id barcode pada table barcode
	 public function getIdBaranginBarcode($id)
	 {
	 	$query="SELECT id_barang from barcode where id_barcode=$id";
	 	return $this->db->query($query)->row()->id_barang;
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
//mengambil data dari tabel barangs,spesifikasi,barcode,ttransaksi,data_transaksi
	 public function getAllHistory()
	 {


	 	$query=$this->db->select('bs.tanggal_pengadaan,bs.ket_barang,bs.keadaan_barang,bs.tanggal_rusak,s.nama_barang,s.no_pabrik,s.merk,tt.nama_penerima,tt.nama_penyerah,tt.jabatan_penerima,tt.jabatan_penyerah,d.tanggal_peletakan,d.lokasi_update,d.lokasi_sebelum,d.lokasi_detail_update,d.lokasi_detail_sebelum')
	 	->from('data_transaksi d')
	 	->join('barcode b','b.id_barcode=d.id_barcode')
	 	->join('ttransaksi tt','tt.id_transaksi=d.id_transaksi')
	 	->join('spesifikasi_barang s','s.id_spesifikasi=b.id_spesifikasi')
	 	->join('barangs bs','bs.id_barang=b.id_barang')
	 	->get();
	 	return $query->result_array();

	 }
//untuk mengambil data table pemilik
	 public function getpemilik()
	 {
	 	$query=$this->db->select('instansi')
	 					->from('pemilik')
	 					->get();
	 	return $query->result_array();
	 }
//untuk mengambil data table lokasi
	 public function getlokasi()
	 {
	 	$query=$this->db->select('id_lokasi,nama_lokasi')
	 					->from('lokasi')
	 					->get();
	 	return $query->result_array();
	 }


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