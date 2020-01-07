<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {
public function __construct(){
		parent :: __construct();
		
		$this->load->helper('form');
		$this->load->model('BarangModel');
		/*Agar dapat ngeload user model tanpa deklasrasi disetiap fungsi yang ada dia auth*/
		
		
	}
	
	public function index()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="YAYASAN SINAI INDONESIA";
		$this->blade->render('yayasan',$data);
	}

	public function dashboard()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Dashboard";
		$data['active']="1";
		$this->blade->render('dashBoard',$data);	
	}

	public function tambahbarang()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Tambah Barang";
		$data['active']="2";
		$this->blade->render('tambahBarang',$data);	
	}


	public function daftarbarang()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$data['daftar']=$this->BarangModel->getAll();
		$this->blade->render('daftarBarang',$data);
	}
		
}
