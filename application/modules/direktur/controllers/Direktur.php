<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends MY_Controller
{
	public function index()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['type']='direktur';
		$data['active']="3";
		redirect("barang/daftarbarangview");
		
	}
}
