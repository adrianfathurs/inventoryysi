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
		$this->load->model('KaryawanModel');
		$this->load->library('pdf');
		$this->load->library('session');
		
		
		/*Agar dapat ngeload user model tanpa deklasrasi disetiap fungsi yang ada dia auth*/
		
		
	}
	
	public function index()
	{if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="YAYASAN SINAI INDONESIA";
		$data['status']="admin";
		redirect('barang/daftarbarangview');
	}
	else
	{
		redirect('start/start');
	}
}

public function dashboard()
{
	$data['title']="INVENTARIS YSI";
	$data['subtitle']="Dashboard";
	$data['status']="admin";
	$data['active']=1;
	$this->blade->render('dashBoard',$data);	
}
public function daftarbarangview()
{if($_SESSION['status'] !== NULL){


	$data['title']="INVENTARIS YSI";
	$data['subtitle']="Daftar Barang";
	$data['active']="DaftarBarang";
	$status=$_SESSION['status'];
	$data['status']=$_SESSION['status'];
	if($status==1)
	{
		$data['status']="admin";
	}
	else if($status==2)
	{
		$data['status']="direktur";	
	}
	else if($status==3)
	{
		$data['status']="user";
	}

	if($this->input->post()){
		echo json_encode($this->input->post());
	}

		//jika terdapat session pda awal load daftar barang maka akan di unset
	if(isset($_SESSION['idcode']) ||isset($_SESSION['idbarcode']))
	{
		unset($_SESSION['idcode']);
		unset($_SESSION['idbarcode']);
		$data['daftar']=$this->BarangModel->getAll();

			//var_dump($transaksi);
		$this->blade->render('daftarBarangview',$data);
	}
	else
	{		
		$data['daftar']=$this->BarangModel->getAll();

		$this->blade->render('daftarBarangview',$data);
			//var_dump($transaksi);
	}
}
else
{
	redirect('start/start');
}
}


	//function tentang transaksi barang
public function daftarbarang()
{
	if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="TransaksiBarang";

		$status=$_SESSION['status'];

		$this->session->unset_userdata('btncetakkuu');
		//menghapus message anda belum memilih barang
		$this->session->unset_userdata('message');
		$data['status']=$_SESSION['status'];
		if($status==1)
		{
			$data['status']="admin";
		}
		else if($status==2)
		{
			$data['status']="direktur";	
		}
		else
		{
			$data['status']="user";
		}

		if(isset($_SESSION['cardcetak']) && isset($_SESSION['cetak']))
		{
			$this->session->unset_userdata('cardcetak');
			$this->session->unset_userdata('cetak');
		}
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
	else
	{
		redirect('start/start');
	}
}



public function tambahbarang()
{
	if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Tambah Barang";
		$data['active']="TambahBarang";
		$status=$_SESSION['status'];
		$data['status']=$_SESSION['status'];

		if($status==1)
		{
			$data['status']="admin";
		}
		else if($status==2)
		{
			$data['status']="direktur";	
		}
		else
		{
			$data['status']="user";
		}

		
		$nosertif=$this->input->post('noSertif');
		if ($nosertif==NULL) {
			# code...
			$this->blade->render('tambahBarang',$data);
		}
		else{
			$foto= $_FILES['foto'];
			$rupiah=$this->input->post('hargaBarang');
			$hargaku=$this->convert_to_number($rupiah);
			$hargaku=(int)$hargaku/100;
			if($foto=''){}
				else{

					$config['upload_path']='./assets/dist/img/imgbarang';
					$config['allowed_types']='jpg|png';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('foto'))
					{
						echo "Upload gagal";die();
					}
					else
					{
						$foto=$this->upload->data('file_name');
					}
				}
				
				
				/*input barang untuk tambah Barang*/
				$barangs=[
					'bahan'=>$this->input->post('bahanBarang'),
					'cara_peroleh'=>$this->input->post('caraBarang'),
					'tanggal_pengadaan'=>$this->input->post('tglBarang'),
					'warna_barang'=>$this->input->post('warnaBarang'),
					'satuan'=>$this->input->post('satuanBarang'),
					'keadaan_barang'=>$this->input->post('keadaanBarang'),
					'harga_satuan'=>$hargaku,
					'tanggal_rusak'=>NULL,
					'lokasi'=>$this->input->post('lokasiBarang'),
					'ket_barang'=>$this->input->post('ket'),
					'foto'=>$foto
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
		else
		{
			redirect('start/start');
		}
	}
	//convert number ke rupiah
	public function convert_to_rupiah($number)
	{
		return number_format($number,2,",",".");
	}
	//convert rupiah ke number	
	public function convert_to_number($rupiah)
	{
		return preg_replace("/[^0-9]/","", $rupiah);
	}
	
	//funtion untuk tampil History Mutasi
	public function historymutasi ()
	{if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="HistoryMutasi";
		$status=$_SESSION['status'];
		$data['status']=$_SESSION['status'];
		if($status==1)
		{
			$data['status']="admin";
		}
		else if($status==2)
		{
			$data['status']="direktur";	
		}
		else
		{
			$data['status']="user";
		}


		//untuk melakukan pengecekan apakah sebelumya terdapat transaksi
		$transaksi=$this->BarangModel->getAllHistory();
		if(isset($transaksi))
		{
			$data['transaksi']=$this->BarangModel->getAllHistory();
			$data['headermutasi']="HISTORY MUTASI BARANG";

			$this->blade->render('historyMutasi',$data);
		}
		else
		{
			$this->session->set_tempdata('messaggecektransaksi','
				<div class="alert alert-warning" role="alert">
				<center> BELUM ADA TRANSAKSI !</center>
				</div>',2000000);
			$this->blade->render('historyMutasi',$data);

		}
	}
	else
	{
		redirect('start/start');
	}	

		//$this->blade->render('historyMutasi',$data);
}
public function tambahbarcode($id,$id_yas,$bulan,$tahunb)
{
	$data['title']="INVENTARIS YSI";
	$data['subtitle']="Daftar Barang";
	$data['active']="3";
	$data['status']="admin";
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
	$this->blade->render('daftarBarangview',$data);
}

	//function hapus data pada tombol back verifikasi barang
public function deleteproses($id)
{
	$data['title']="INVENTARIS YSI";
	$data['subtitle']="Tambah Proses";
	$data['active']="2";
	$data['status']="admin";
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
	$data['status']="admin";
	$id_barang=$this->BarangModel->getIdBaranginBarcode($id);
	$this->BarangModel->setDeleteIdDataTransaksi($id);
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
	$data['status']="admin";
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
	$data['status']="admin";
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

	//funtiom untuk menempilkan daftar berdasarkan id_barcode
	public function selectbarcode()
	{if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['active']="TransaksiBarang";
		$status=$_SESSION['status'];
		if($status==1)
		{
			$data['status']="admin";
		}
		else if($status==2)
		{
			$data['status']="direktur";	
		}
		else
		{
			$data['status']="user";
		}
		
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
			$data['karyawan']=$this->KaryawanModel->getKaryawan();
			$data['daftar']=$this->BarangModel->getAllbyIdbarcodewherein($idbarcode);
			$data['headerpencetakan']="SERAH TERIMA BARANG";
			$this->blade->render('transaksi/transaksiBarang',$data);
		}
		//pengendalian apabila tidak terdapat session dan idbarcoude unidenfined
		else if(!isset( $_SESSION['idcode']) && !isset($_POST['idbarcode']))
		{
			$data['subtitle']="Daftar Barang";
			$this->session->set_userdata('message','
				<div class="alert alert-warning" role="alert">
				<center> Anda belum Memilih Barang</center>
				</div>');
			$data['daftar']=$this->BarangModel->getAll();
			$data['headerpencetakan']="SERAH TERIMA BARANG";
			$this->blade->render('daftarBarang',$data);	


		}
		//pengendalian apabila id barcode identifikasi dan tidak terdapat session aktif 
		else
		{
			$idbarcode=$this->input->post('idbarcode');	
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
			$data['karyawan']=$this->KaryawanModel->getKaryawan();
			$data['daftar']=$this->BarangModel->getAllbyIdbarcodewherein($idbarcode);
			$data['headerpencetakan']="SERAH TERIMA BARANG";
			$this->blade->render('transaksi/transaksiBarang',$data);
		}	

	}
	else
	{
		redirect('start/start');
	}	
}

	//function tampil code
public function tampilcode()
{if($_SESSION['status'] !== NULL){
	$data['title']="INVENTARIS YSI";
	$data['subtitle']="Tampil Code";
	$data['active']="DaftarBarang";
	$status=$_SESSION['status'];
	if($status==1)
	{
		$data['status']="admin";
	}
	else if($status==2)
	{
		$data['status']="direktur";	
	}
	else
	{
		$data['status']="user";
	}
	$idbarcode=$this->input->post('idbarcode');
	$this->session->set_userdata('idbarcode',$idbarcode);
	if(isset($_POST['idbarcode']))
	{
			//$id ini akan mengambil id dept dan id yayasan
		$id=$this->BarangModel->getAllbyIdbarcode($idbarcode);
		foreach ($id as $key ) {
			$iddepartement=$key['id_departement'];
			$idyayasan=$key['id_yayasan'];
		}
		$idbarang=$this->input->post('idbarang');
		$date_month=$this->input->post('date_month');
		$date_year=$this->input->post('date_year');

	///////////////////////////////////////////////////////////////////////////////////////////////////
	//buat menyetak qr code dan barcode
		$code=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$coder=(int)($idbarang.$iddepartement.$idyayasan.$date_month.$date_year);

			//untuk code convert qrcode
			/*$qrCode= new Endroid\QrCode\QrCode($code);
			$qrCode->writeFile('temp/'.$code.'.png');
			*/
			error_reporting(0);
			$tempdir = "assets/dist/img/qrcode/"; 
			if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
			mkdir($tempdir);
			$isi_teks = $code;
			$namafile = $code.".png";
			$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
			$ukuran = 2; //batasan 1 paling kecil, 10 paling besar
			$padding = 1;
			QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

			//untuk code convert barcode
			
			$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
			file_put_contents('assets/dist/img/barcode/'.$coder.'.jpg', $generator->getBarcode($coder,$generator::TYPE_CODE_128));

			//untuk melempar ke view
			$data['kode']=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
			$this->blade->render('barang/tampilCode',$data);
		}
		else
		{
			redirect('barang/daftarbarangview');
		}

	}
	else
	{
		redirect('start/start');
	}	
}

/////////
public function qrcode($index)
{
	$idbarcode=$_SESSION['idbarcode'];		
	$daftar=$this->BarangModel->getAllbyIdbarcodewhere($idbarcode);
	foreach ($daftar as $key) {
		$date=strtotime($key['tanggal_pengadaan']);
		$date_month=date('n',$date);
		$date_year=date('y',$date);
		$nama_barang=$key['nama_barang'];
		$coder=$key['id_barang'].$key['id_yayasan'].$key['id_departement'].$date_month.$date_year;
	}
	$cek=base_url('assets/dist/img/qrcode/'.$coder.'.png');
	if(isset($cek))
	{
		$image=base_url('assets/dist/img/qrcode/'.$coder.'.png');
	}
	else
	{
		$tempdir = "assets/dist/img/qrcode/"; 
			if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
			mkdir($tempdir);
			$isi_teks = $coder;
			$namafile = $coder.".png";
			$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
			$ukuran = 2; //batasan 1 paling kecil, 10 paling besar
			$padding = 1;
			QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
			$image=base_url('assets/dist/img/qrcode/'.$coder.'.png');
		}

		$pdf = new FPDF('P', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		$pdf->SetMargins(25, 5);
		$pdf->SetAutoPageBreak('off', 2);

		$image1 = base_url('assets/dist/img/Teladan.png');
		$image2 = base_url('assets/dist/img/sinai.png');


		//Header
		$pdf->Image($image2, 25, 4, 27);
		$pdf->Image($image1, 165, 4, 20);
		$pdf->Cell(0, 8, '', 0, 1);
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(0, 7, 'DAFTAR BARCODE', 0, 1, 'C');
		$pdf->SetFont('Times', '', 12);
		$pdf->Ln(3);
		
		$j=0;
		$y=50;
		$t=30;

		while($j<1)
		{
			
			$k=0;
			$x=25;
			$get_c=10;
			$pdf->Cell($get_c, $t,$nama_barang, 0,1);
			while($k<4){
				$pdf->Image($image,$x,$y, 30);

				$x+=40;

				$k++;
			}
			$j++;
			$y+=20;
			$t=$t-15;
		}

		$kode = $index;
		if ($kode == '1')
			$pdf->Output('D', 'Qrcode.pdf');
		else if ($kode == '0')
			$pdf->Output('I', 'Qrcode.pdf');


	}	
///////////////////

	public function barcode($index)
	{
		$idbarcode=$_SESSION['idbarcode'];		
		$daftar=$this->BarangModel->getAllbyIdbarcodewhere($idbarcode);
		foreach ($daftar as $key) {
			$date=strtotime($key['tanggal_pengadaan']);
			$date_month=date('n',$date);
			$date_year=date('y',$date);
			$nama_barang=$key['nama_barang'];
			$coder=$key['id_barang'].$key['id_yayasan'].$key['id_departement'].$date_month.$date_year;
		}
			//kalo udah ada diflie assets/dist/img/barcode tinggal ngambil
		$cek=base_url('assets/dist/img/barcode/'.$coder.'.jpg');
		if(isset($cek))
		{
			$image=base_url('assets/dist/img/barcode/'.$coder.'.jpg');
		}
		else
		{

			$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
			$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
			file_put_contents('assets/dist/img/barcode/'.$coder.'.jpg', $generator->getBarcode($coder,$generator::TYPE_CODE_128));
			$image=base_url('assets/dist/img/barcode/'.$coder.'.jpg');
		}

		$pdf = new FPDF('P', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		$pdf->SetMargins(25, 5);
		$pdf->SetAutoPageBreak('off', 2);

		$image1 = base_url('assets/dist/img/Teladan.png');
		$image2 = base_url('assets/dist/img/sinai.png');


		//Header
		$pdf->Image($image2, 25, 4, 27);
		$pdf->Image($image1, 165, 4, 20);
		$pdf->Cell(0, 8, '', 0, 1);
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(0, 7, 'DAFTAR BARCODE', 0, 1, 'C');
		$pdf->SetFont('Times', '', 12);
		$pdf->Ln(3);
		
		$j=0;
		$y=50;
		$t=30;

		while($j<1)
		{
			
			$k=0;
			$x=25;
			$get_c=10;
			$pdf->Cell($get_c, $t,$nama_barang, 0,1);
			while($k<4){
				$pdf->Image($image,$x,$y, 30);

				$x+=40;

				$k++;
			}
			$j++;
			$y+=20;
			$t=$t-15;
		}

		$kode = $index;
		if ($kode == '1')
			$pdf->Output('D', 'Barcode.pdf');
		else if ($kode == '0')
			$pdf->Output('I', 'Barcode.pdf');
	}

///////////////////////////////////////////////////////////////////////////////////////////////////

	
	/*##########################################################*/
	//function untuk update barang/edit data barang
	public function updatedata()
	{
		if(isset($_POST['btnSubmit'])){
			$id_barang=$this->input->post('idBarang');
			$id_barcode=$this->input->post('idBarcode');
			$harga_database=$this->BarangModel->getAllbyIdbarcode($id_barcode);
			foreach ($harga_database as $key ) {
				$hargadab=$key['harga_satuan'];
			}
			$rupiah=$this->input->post('hargaBarang');
			if ($hargadab!== $rupiah)
			{
			$hargaku=$this->convert_to_number($rupiah);
			$hargaku=(int)$hargaku/100;
			}
			else
			{
				$hargaku=$this->input->post('hargaBarang');
			}
			$foto= $_FILES['foto'];
			if($foto=''){}
				else{
					$config['upload_path']='./assets/dist/img/imgbarang';
					$config['allowed_types']='jpg|png';
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('foto'))
					{
						echo "Upload gagal";die();
					}
					else
					{
						$foto=$this->upload->data('file_name');
					}
				}
				$barangs=[
					'id_barang'=>$id_barang,	
					'bahan'=>$this->input->post('bahanBarang'),
					'cara_peroleh'=>$this->input->post('caraBarang'),
					'tanggal_pengadaan'=>$this->input->post('tglBarang'),
					'warna_barang'=>$this->input->post('warnaBarang'),
					'satuan'=>$this->input->post('satuanBarang'),
					'keadaan_barang'=>$this->input->post('keadaanBarang'),
					'harga_satuan'=>$hargaku,
					'tanggal_rusak'=>$this->input->post('tglBarangRusak'),
					'lokasi'=>$this->input->post('lokasiBarang'),
					'ket_barang'=>$this->input->post('ketBarang'),
					'foto'=>$foto
				];
				var_dump($barangs);
				$setUpdateBarangs=$this->BarangModel->setUpdateBarangs($barangs,$id_barang);
				var_dump($setUpdateBarangs);
				redirect('barang/daftarbarang');

			}
			else
			{
				redirect('barang/daftarbarang');
			}
		}
		/*##########################################################*/
	//function untuk mengedit ketbarang di view update barang
		public function updateket()
		{$data['status']="admin";
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

	//function untuk mengedit tanggal dan keadaan barang
public function updatebarang($id,$idbarang,$iddepartement,$idyayasan,$date_month,$date_year)
{	$data['title']="INVENTARIS YSI";
$data['subtitle']="Transaksi Barang";
$data['active']="3";
$data['status']="admin";
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


















}
