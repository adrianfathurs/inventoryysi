<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function index()
	{
		
	}
	public function admin()
	{if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$data['status']="admin";
		$data['type']="admin";
		redirect('barang/daftarbarangview');
	}
	else{
		$this->blade->render('start/start');
	}
	}
}
