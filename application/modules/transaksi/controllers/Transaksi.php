<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('vendor/autoload.php') ;
include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA



class Transaksi extends MY_Controller {
public function __construct(){
		parent :: __construct();
		
		$this->load->helper('form');
		$this->load->model('TransaksiModel');
		
		/*Agar dapat ngeload user model tanpa deklasrasi disetiap fungsi yang ada dia auth*/
		
		
	}

	//function yang digunakan untuk menselect id barcode dari view daftarbarang
	public function selectidbarcode($id,$idbarang,$iddepartement,$idyayasan,$date_month,$date_year)
	{
		//parameter $id adalah parameter id_barcode
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['daftar']=$this->TransaksiModel->getAllbyIdbarcode($id);
		//code itu digunakan untuk convert code ke barcode atau qrcode
		$code=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($idbarang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		/*$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		*/
		$tempdir = "temp/"; 
		if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
	    mkdir($tempdir);
		$isi_teks = $code;
		$namafile = $code.".png";
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 2; //batasan 1 paling kecil, 10 paling besar
		$padding = 1;
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

		//untuk code convert barcode
		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($codestr,$generator::TYPE_CODABAR));

		//untuk melempar ke view
		$data['kode']=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$this->blade->render('transaksiBarang',$data);
	}

	//function untuk insert data transaksi di table ttransaksi
	public function setTambah($id)
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$ttransaksi=[
			'jabatan_penerima'=>$this->input->post('jabpenerima'),
			'jabatan_penyerah'=>$this->input->post('jabpenyerah'),
			'ket'=>$this->input->post('ket'),
			'lokasi_peletakan'=>$this->input->post('lokasibarang'),
			'nama_penerima'=>$this->input->post('penerima'),
			'nama_penyerah'=>$this->input->post('penyerah'),
			'tgl_peletakan'=>$this->input->post('tglpenyerah')
		];
		$this->TransaksiModel->setTambahttransaksi($ttransaksi);
		$id_transaksi=$this->TransaksiModel->get_idtransaksi();
		$datatransaksi=[
			'id_transaksi'=>$id_transaksi,
			'id_barcode'=>$id,
			'tanggal_peletakan'=>$this->input->post('tglpenyerah'),
			'lokasi_update'=>$this->input->post('lokasibarang')
		];
		$this->TransaksiModel->setTambahdatatransaksi($datatransaksi);
		$data['daftar']=$this->TransaksiModel->getAllbyIdbarcode($id);
		$this->blade->render("transaksiBarang",$data);
	}

}
