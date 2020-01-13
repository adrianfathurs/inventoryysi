<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('vendor/autoload.php') ;
include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA



class Barang extends MY_Controller {
public function __construct(){
		parent :: __construct();
		
		$this->load->helper('form');
		$this->load->model('BarangModel');
		$this->load->model('DepartementModel');
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
	//Ambil data table departement
		$data['dept']=$this->DepartementModel->getDepartement();	
	//contoh pengambilan id setelah proses insert dilakukan dengan mengambil id paling akhir
		$id=$this->BarangModel->get_id();
		$data['get']=$this->BarangModel->getAllbyId($id);
		$data['id']=$this->BarangModel->get_id();
	//disini tempat untuk memanggil model khusus convert bulan dan tahun dari tabel barangs coloumn date
			
	//load function getdepartement model;
		$this->blade->render('verifikasiBarang',$data);


	//contoh awal pembuatan id yang diambil setelah input
		//$data['no']=$this->BarangModel->get_id();
		//$data['get']=$this->BarangModel->getAllbyId($id);
		//$this->blade->render('tambahBarcode',$data);

		}	
	}

	public function tambahbarcode($id,$bulan,$tahunb)
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Data ID Barang";
		$data['active']="1";
		$this->blade->render('dashBoard');	
	}

	public function barcode()
	{
	$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
	/*SVG*///echo $generator->getBarcode('1', $generator::TYPE_CODE_128);
	$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
	echo '<img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode('123111299', $generatorPNG::TYPE_CODE_128)) . '">';
	
	/*kalo mau menyimpan qr ccode disuatu local dist*/
	/*$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
	if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);
	
 
	$isi_teks = "1111111";
	$namafile = "tono.png";
	$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
	$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
	$padding = 0;
 
	$Qrcode=QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
	echo '<img src=templateyysi/temp/coba.png>';*/
	}

	public function qrcode()
	{
		$code=123170051;
		$qrCode= new Endroid\QrCode\QrCode($code);

		$qrCode->writeFile('temp/'.$code.'.png');
		;
		redirect('barang');
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
