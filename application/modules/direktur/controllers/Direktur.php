<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends MY_Controller
{
	public function index()
	{
		
	}
	public function direktur()
	{
		if($_SESSION['status'] !== NULL){
			$data['title']="INVENTARIS YSI";
			$data['subtitle']="Daftar Barang";
			$data['type']="direktur";
			$data['status']="direktur";
			$data['active']="3";
			redirect('barang/daftarbarangview');
		}
		else{
			redirect('start/start');
		}

	}

}