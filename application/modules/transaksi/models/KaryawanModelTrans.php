<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModelTrans extends CI_Model {

	public function getJabatanKaryawanbyId($id)
	{
		$query="SELECT nama_jabatan from karyawan where id_karyawan='$id'";
		return $this->db->query($query)->row()->nama_jabatan;
	}
	public function getNamaKaryawanbyId($id)
	{
		$query="SELECT nama from karyawan where id_karyawan='$id'";
		return $this->db->query($query)->row()->nama;
	}
}