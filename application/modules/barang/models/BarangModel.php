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




	
}