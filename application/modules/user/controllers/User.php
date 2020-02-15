<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
	public function __construct()
	{
		parent :: __construct();
		

        $this->load->library('session');
	}
	public function index()
	{
		$$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$status="3";
		$this->session->set_userdata('status',$status);
		redirect('barang/daftarbarangview');
	}
}
