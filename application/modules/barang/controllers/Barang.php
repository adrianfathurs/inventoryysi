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
		$this->load->model('YayasanModel');

        $this->load->library('session');
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

	public function daftarbarang()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		//mencoba untuk json
		/*$data['daftar']=$this->BarangModel->getAll();
		$daftarku=$this->BarangModel->getAll();
		echo json_encode($daftarku);
		$this->blade->render('daftar',$data);
*/
		if($this->input->post()){
			echo json_encode($this->input->post());
		}

		//jika terdapat session pda awal load daftar barang maka akan di unset
		if(isset($_SESSION['idcode']))
			{
				unset($_SESSION['idcode']);
				$data['daftar']=$this->BarangModel->getAll();
				$this->blade->render('daftarBarang',$data);
			}
		else
			{		
				$data['daftar']=$this->BarangModel->getAll();
				$this->blade->render('daftarBarang',$data);
			}
	}

	public function tambahbarang()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Tambah Barang";
		$data['active']="2";
		$nosertif=$this->input->post('noSertif');
		if ($nosertif==NULL) {
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
		'lokasi'=>$this->input->post('lokasiBarang'),
		'ket_barang'=>$this->input->post('ket')
		];

		$spesifikasi=[
		'nama_barang'=>$this->input->post('namaBarang'),
		'merk'=>$this->input->post('merkBarang'),
		'no_pabrik'=>$this->input->post('noSertif')
		];



		$tambah=$this->BarangModel->setTambah($barangs,$spesifikasi);
	//Ambil data table Yayasan
		$data['yas']=$this->YayasanModel->getyayasan();
	//Ambil data table departement
		$data['dept']=$this->DepartementModel->getDepartement();	
	//contoh pengambilan id setelah proses insert dilakukan dengan mengambil id paling akhir
		$id=$this->BarangModel->get_id();
		$data['daftar']=$this->BarangModel->getAllbyId($id);
		$data['id']=$this->BarangModel->get_id();
	
			
	//load function getdepartement model;
		$this->blade->render('verifikasiBarang',$data);


	//contoh awal pembuatan id yang diambil setelah input
		//$data['no']=$this->BarangModel->get_id();
		//$data['get']=$this->BarangModel->getAllbyId($id);
		//$this->blade->render('tambahBarcode',$data);

		}	
	}

	public function tambahbarcode($id,$id_yas,$bulan,$tahunb)
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$depart=$this->input->post('departement');
		echo $depart;
		echo $id.$id_yas.$bulan.$tahunb;
		$barcode=[
			'id_barang'=>$id,
			'id_departement'=>$this->input->post('departement'),
			'id_yayasan'=>$id_yas,
			'bulan'=>$bulan,
			'tahun'=>$tahunb,
			'id_spesifikasi'=>$id
		];
	//untuk memanggil function setBarcode di Barang Model
		$this->BarangModel->setBarcode($barcode);
		$data['daftar']=$this->BarangModel->getAll();
		$this->blade->render('daftarBarang',$data);
	}

	//function hapus data pada tombol back verifikasi barang
	public function deleteproses($id)
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Tambah Proses";
		$data['active']="2";
		$this->BarangModel->setDelete($id);
		//$data['daftar']=$this->BarangModel->getAll();
		$this->blade->render('tambahBarang',$data);	
	}

	//function yang digunakan untuk mendelete id baarcode dari view daftar barang beserta data di table barangs dan spesifikasi
	public function deleteidbarcode($id)
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Daftar Barang";
		$data['active']="3";
		$id_barang=$this->BarangModel->getIdBaranginBarcode($id);
		$this->BarangModel->setDeleteIdBarcode($id);
		$this->BarangModel->setDelete($id_barang);
		$data['daftar']=$this->BarangModel->getAll();
		$this->blade->render('daftarBarang',$data);	
	}

	//function untuk memanggil semua data barangs dan spesifikasi
	public function selectidbarcode($id,$id_barang)
	{
		//parameter $id adalah parameter id_barcode
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="3";
		$idbar=$_SESSION['idcode'];
		$data['daftar']=$this->BarangModel->getAllbyIdbarcode($id);
		var_dump($_SESSION['idcode']);
		$data['kembali']=$this->BarangModel->getAllbyIdbarcodewherein($idbar);
		$this->blade->render('updateBarang',$data);
	}

	//function untuk memanggil semua data barangs dan spesifkasi dari view transaksibarang
	public function selectidbarang($id,$id_barang,$iddepartement,$idyayasan,$date_month,$date_year)
	{
		//parameter $id adalah parameter id_barcode
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="3";
		//session utnuk menyimpan id barang
		$this->session->set_userdata('idrang',$id_barang);
		$this->session->set_userdata('iddepartement',$iddepartement);
		//array $id barcode select
		$this->session->set_userdata('idbarcode',$id);
		//array session barcode
		$idbar=$_SESSION['idcode'];
		$data['daftar']=$this->BarangModel->getAllbyIdbarcode($id);
		var_dump($date_month);
		$data['kembali']=$this->BarangModel->getAllbyIdbarcodewherein($idbar);
		
	//buat menyetak qr code dan barcode
	$code=$id_barang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($id_barang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		/*$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		*/
		error_reporting(0);
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
		$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($coder,$generator::TYPE_CODABAR));

		//untuk melempar ke view
		$data['kode']=$id_barang.$iddepartement.$idyayasan.$date_month.$date_year;
		$this->blade->render('updateBarang',$data);





	}

	//function untuk menampilkan daftar id menggunkaan ajax
	public function selectbarcode()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="3";
		$id=$this->input->post('id');
		$where=array(
			'id'=>$id
		);
		$databarang=$this->BarangModel->getAllbyIdbarcodewherein($where);
		echo json_encode($databarang);
		var_dump($where);
	}

	//funtiom untuk menempilkan daftar berdasarkan id_barcode
	/*public function selectbarcode()
	{
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="3";
		
			//pengendalian jika terdapat session aktif		
			if(isset($_SESSION['idcode']))
				{
					$idbarcode=$_SESSION['idcode'];
					$i=0;
					$idbar=array();
					$jumlah=count($idbarcode);
					
					echo $jumlah;
						while($i < $jumlah)
						{
							$id=$idbarcode[$i];
							echo $id;
								//echo $idbar[$i];
								$where=array($idbarcode[$i]);
							$i++;
							//echo $i;

							//untuk mengisi nilai session
							
								array_push($idbar,$id);
						}
						//var_dump($idbarcode);
						$this->session->set_userdata('idcode',$idbar);
						//print_r($idbar);
						print_r($_SESSION['idcode']);

						$data['daftar']=$this->BarangModel->getAllbyIdbarcodewherein($idbarcode);
					$this->blade->render('transaksi/transaksiBarang',$data);
			}
		//pengendalian apabila tidak terdapat session dan idbarcoude unidenfined
		else if(!isset( $_SESSION['idcode']) && !isset($_POST['idbarcode']))
			{
					$data['subtitle']="Daftar Barang";
					$this->session->set_tempdata('message','
						<div class="alert alert-warning" role="alert">
							<center> Anda belum Memilih Barang</center>
						</div>',5);
					$data['daftar']=$this->BarangModel->getAll();
					$this->blade->render('daftarBarang',$data);	


			}
		//pengendalian apabila id barcode identifikasi dan tidak terdapat session aktif 
		else
			{
					$idbarcode=$_POST['idbarcode'];	
					$i=0;
					$idbar=array();
					$jumlah=count($idbarcode);
					echo $jumlah;
						while($i < $jumlah)
						{
							$id=$idbarcode[$i];
							echo $id;
								//echo $idbar[$i];
								$where=array($idbarcode[$i]);
							$i++;
							//echo $i;

							//untuk mengisi nilai session
							
								array_push($idbar,$id);
						}
						//var_dump($idbarcode);
						$this->session->set_userdata('idcode',$idbar);
						//print_r($idbar);
						print_r($_SESSION['idcode']);

						$data['daftar']=$this->BarangModel->getAllbyIdbarcodewherein($idbarcode);
						$this->blade->render('transaksi/transaksiBarang',$data);
			}	
	}*/
	//function untuk mengedit ketbarang di view update barang
	public function updateket()
	{
		$idrang=$_SESSION['idrang'];

		if (isset($_POST['btnupdate']))
		{
			$array=array(
				'ket_barang'=>$this->input->post('txtketBarang')
				);
			$where=array('id_barang'=>$idrang);
			$update=$this->BarangModel->setupdateket($array,$where);
			var_dump($idrang);
			$iddepartement=$_SESSION['iddepartement'];
			$idyayasan=$this->YayasanModel->getyayasan();
			$ambildate=$this->BarangModel->getAllbyId($idrang);
			foreach ($ambildate as $key ) {
				$date=strtotime($key['tanggal_pengadaan']);
			}
             $date_month=date('m',$date);
             $date_year=date('y',$date);

		$idbar=$_SESSION['idcode'];
		$id=$_SESSION['idbarcode'];
		$data['daftar']=$this->BarangModel->getAllbyIdbarcode($id);
		var_dump($date_month);
		$data['kembali']=$this->BarangModel->getAllbyIdbarcodewherein($idbar);
		
	//buat menyetak qr code dan barcode
	$code=$idrang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($idrang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		/*$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		*/
		error_reporting(0);
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
		$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($coder,$generator::TYPE_CODABAR));

		//untuk melempar ke view
		$data['kode']=$idrang.$iddepartement.$idyayasan.$date_month.$date_year;
		$this->blade->render('updateBarang',$data);


		}
	}
	//funtion untuk mengedit ketbarang di view update barang
	/*public function updateket()
	{ if(isset($_POST['id_barang'])){

	
		if ($_POST['id_barang'] !='')
		{
			$idbarang=$this->input->post('id_barang');
			
			$array=array(
				'ket_barang'=>$this->input->post('txtketBarang')
			);
			echo json_encode($array);
			$where=array('id_barang'=>$idbarang);
			$update=$this->BarangModel->setupdateket($array,$where);
		
			$idbar=$_SESSION['idcode'];
		$data['daftar']=$this->BarangModel->getAllbyIdbarcode($id);
		var_dump($_SESSION['idcode']);
		$data['kembali']=$this->BarangModel->getAllbyIdbarcodewherein($idbar);
		
	//buat menyetak qr code dan barcode
	$code=$id_barang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($id_barang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		
	
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
		$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($coder,$generator::TYPE_CODABAR));

		//untuk melempar ke view
		$data['kode']=$id_barang.$iddepartement.$idyayasan.$date_month.$date_year;
		
		$this->blade->render('updateBarang',$data);


		}
		else
		{
			var_dump($_POST['id_barang']);
		}
	}
	}
*/
	//function untuk mengedit tanggal dan keadaan barang
	public function updatebarang($id,$idbarang,$iddepartement,$idyayasan,$date_month,$date_year)
	{	$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="3";
		if(isset($_POST['perbarui'])){
		/*ditambah statement pengendalian untuk a*/
		$idbar=$_SESSION['idcode'];
        $tanggal_rusak=$this->input->post('tanggalrusak');
        echo $tanggal_rusak;
		$array = array(
		'id_barang'=>$idbarang,	
		'bahan'=>$this->input->post('bahanBarang'),
		'cara_peroleh'=>$this->input->post('caraPeroleh'),
		'tanggal_pengadaan'=>$this->input->post('tanggalPeroleh'),
		'warna_barang'=>$this->input->post('warnaBarang'),
		'satuan'=>$this->input->post('satuanBarang'),
		'keadaan_barang'=>$this->input->post('keadaanbarang'),
		'harga_satuan'=>$this->input->post('hargaBarang'),
		'tanggal_rusak'=>$this->input->post('tanggalrusak'),
		'lokasi'=>$this->input->post('lokasiperoleh')
		);
			
			
		echo var_dump($array);
		//syntax untuk update
		$where=array('id_barang'=>$idbarang);
		$update=$this->BarangModel->setUpdateku($array,$where);
		$data['daftar']=$this->BarangModel->getAllbyIdbarcodewherein($idbar);
		//code itu digunakan untuk convert code ke barcode atau qrcode
		$code=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($idbarang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		/*$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		*/
		error_reporting(0);
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
		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($code,$generator::TYPE_CODABAR));
		//unset session idall tentang iddepartement,idyayasan,date_month,date_year
		unset($_SESSION['idall']);
		//untuk melempar ke view
		$data['kode']=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$this->blade->render('transaksi/transaksiBarang',$data);
		}
	}














	//function 
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

	
	
}
