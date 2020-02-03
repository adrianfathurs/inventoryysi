<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model {

	public function getKaryawan()
	{
		$query="SELECT nama, nama_jabatan,id_karyawan from karyawan";
		return $this->db->query($query)->result_array();
	}
}