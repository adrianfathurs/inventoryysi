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
	//update tables barangs
	public function setUpdateBarangsbyId($idbarang,$barangs)
	{

		return $this->db->where('id_barang', $idbarang)
				->update('barangs', $barangs);
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
	//set update data table ttransaksi
	public function setUpdateTransaksi ($ttransaksi,$id_transaksi)
	{
		return $this->db->where('id_transaksi',$id_transaksi)
		->update('ttransaksi',$ttransaksi);
	}
	

	//untuk mengambil id_transaksi terakhir setelah data di insert
	public function get_idtransaksi()
	{
			$query="SELECT id_transaksi FROM ttransaksi where id_transaksi IN (SELECT MAX(id_transaksi) FROM ttransaksi)";
			//return $this->db->query($query)->row_array();
			return $this->db->query($query)->row()->id_transaksi;
	}
	//untuk mengambil id_dat_transaksi terakhir setelah data di insert
	public function get_id_data_transaksi($id)
	{
			$query = $this->db->select('dt.id_barcode')
                  ->from('data_transaksi dt')
                  ->where('id_transaksi',$id)
                  ->get();
                  return $query->result_array();
	}
	//untuk mengambil semua data di tabel ttransaksi
	public function getAllttransaksi($id_transaksi)
	{
		$query=$this->db->select('d.*')
					->from('ttransaksi d')
					->where('id_transaksi',$id_transaksi)
					->get();
					return $query->result_array();
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
	public function getAllHistoryTransaksi()
	{
		$query=$this->db->select('bs.ket_barang,bs.tanggal_rusak,s.nama_barang,s.no_pabrik,s.merk,tt.nama_penerima,tt.nama_penyerah,tt.jabatan_penerima,tt.jabatan_penyerah,d.tanggal_peletakan,d.lokasi_update,d.lokasi_sebelum')
	 	->from('data_transaksi d')
	 	->join('barcode b','b.id_barcode=d.id_barcode')
	 	->join('ttransaksi tt','tt.id_transaksi=d.id_transaksi')
	 	->join('spesifikasi_barang s','s.id_spesifikasi=b.id_spesifikasi')
	 	->join('barangs bs','bs.id_barang=b.id_barang')
	 	->get();
	 	return $query->result_array();
	}
	public function getTransaksi($id)
	{
		$query=$this->db->select('bs.id_barang,s.nama_barang,bs.tanggal_pengadaan,s.nama_barang,s.no_pabrik,s.merk,tt.nama_penerima,tt.jabatan_penerima,tt.jabatan_penyerah,tt.nama_penyerah,tt.ket,tt.tgl_peletakan,dp.nama_departement,y.nama,bs.ket_barang,d.tanggal_peletakan')
	 	->from('data_transaksi d')
	 	->join('barcode b','b.id_barcode=d.id_barcode')
	 	->join('ttransaksi tt','tt.id_transaksi=d.id_transaksi')
	 	->join('spesifikasi_barang s','s.id_spesifikasi=b.id_spesifikasi')
	 	->join('barangs bs','bs.id_barang=b.id_barang')
	 	->join('departement dp','dp.id_departement=b.id_departement')
	 	->join('yayasan y','y.id_yayasan=b.id_yayasan')
	 	->where('tt.id_transaksi',$id)
	 	->get();
	 	return $query->result_array();
	}

}