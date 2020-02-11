<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function index()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$data['status']="admin";
		redirect('barang/daftarbarangview');
	}
}
