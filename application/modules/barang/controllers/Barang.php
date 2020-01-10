<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('vendor/autoload.php') ;



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
		$bahan=$this->input->post('bahanBarang');
		if ($bahan==NULL) {
			# code...
			$this->blade->render('tambahBarang',$data);
		}
		else{
			
		/*input barang untuk tambah Barang*/
		$barangs=[
		'bahan'=>$this->input->post('bahanBarang'),
		'cara_peroleh'=>$this->input->post('caraBarang'),
		'tanggal_pengadaan'=>$this->input->post('tglBarang'),
		'warna_barang'=>$this->input->post('warnaBarang'),
		'satuan'=>$this->input->post('satuanBarang'),
		'keadaan_barang'=>$this->input->post('keadaanBarang'),
		'harga_satuan'=>$this->input->post('hargaBarang'),
		'tanggal_rusak'=>NULL,
		'lokasi'=>$this->input->post('lokasiBarang')
		];

		$spesifikasi=[
		'nama_barang'=>$this->input->post('namaBarang'),
		'merk'=>$this->input->post('merkBarang'),
		'no_pabrik'=>$this->input->post('noSertif')
		];

		$tambah=$this->BarangModel->setTambah($barangs,$spesifikasi);
		redirect(barang); 	
		}
		
		
	}

	public function barcode()
	{
	$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
	/*SVG*///echo $generator->getBarcode('1', $generator::TYPE_CODE_128);
	$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
	echo '<img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode('123111299', $generatorPNG::TYPE_CODE_128)) . '">';

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
