<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StartModel extends CI_Model {
	
	
	public function getAkunkaryawan ($username)
		{ 
		$query = $this->db->query("SELECT akun_id,akun_username,akun_password,is_active,status FROM karyawan_akun WHERE akun_username='$username'");
        return $query->row_array();
		}
	public function getKaryawanbyId($akun_id)
	{
		$query = $this->db->query("SELECT id_karyawan,nama,nama_jabatan FROM karyawan WHERE akun_id='$akun_id'");
        return $query->row_array();
	}
}
?>