<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('vendor/autoload.php') ;
include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA



class Transaksi extends MY_Controller {
	public function __construct(){
		parent :: __construct();
		
		$this->load->helper('form');
		$this->load->model('TransaksiModel');
		$this->load->model('KaryawanModelTrans');
		$this->load->model('LokasiModelTrans');
		$this->load->library('pdf');
		
		/*Agar dapat ngeload user model tanpa deklasrasi disetiap fungsi yang ada dia auth*/
		
		
	}

	//function yang digunakan untuk menselect id barcode dari view daftarbarang
	public function selectidbarcode($iddepartement,$idyayasan,$date_month,$date_year,$idbar)
	{
		//parameter $id adalah parameter id_barcode
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$status=$_SESSION['status'];
		if($status==1)
		{
			$data['status']="admin";
		}
		else
		{
			$data['status']="direktur";	
		}
		//yang bener $data['daftar']=$this->TransaksiModel->getAllbyIdbarcode($id);
		//$data['daftar']=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);


		if(isset($_SESSION['idcode']))
		{
			$idbarcode=$_SESSION['idcode'];
		}
		else{
			$idbarcode=$_POST['idbarcode'];	
		}
		
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

		$data['daftar']=$this->TransaksiModel->getAllbyIdbarcodewherein($idbarcode);








		//code itu digunakan untuk convert code ke barcode atau qrcode
//		$code=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
//		$coder=(int)($idbarang.$iddepartement.$idyayasan.$date_month.$date_year);
		
		//vardumb buat convert dari int ke string
//		$codestr=var_dump((string) $coder);
		
		//untuk code convert qrcode
		/*$qrCode= new Endroid\QrCode\QrCode($code);
		$qrCode->writeFile('temp/'.$code.'.png');
		*/
//		$tempdir = "temp/"; 
//		if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
//	    mkdir($tempdir);
//		$isi_teks = $code;
//		$namafile = $code.".png";
//		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
//		$ukuran = 2; //batasan 1 paling kecil, 10 paling besar
//		$padding = 1;
//		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

		//untuk code convert barcode
//		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
//		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		//error_reporting(0);
//		file_put_contents('temp/barcode/'.$code.'.jpg', $generator->getBarcode($code,$generator::TYPE_CODABAR));

		//untuk melempar ke view
//		$data['kode']=$idbarang.$iddepartement.$idyayasan.$date_month.$date_year;
		$this->blade->render('transaksiBarang',$data);
	}
	//function ini digunakan untuk menhapus id yang telah diinputkan pada sertibar apabila telah menginputkan barang
	public function clearId()
	{
		if(isset($_SESSION['btncetakkuu']))
		{
			$id_transaksi=$this->TransaksiModel->getIdtransaksi();
			$this->TransaksiModel->setDeleteIdDataTransaksi($id_transaksi);
			redirect('barang/daftarbarang');
		}
		else
		{
			redirect('barang/daftarbarang');
		}
	}
	//function API untuk menampilkan select BOX sertibar
	public function selectBox()
	{ 	
		$id = $this->input->post('id');
		$option = $this->input->post('op');
		if ($option==1)
			{ 	$nama_jabatan=$this->KaryawanModelTrans->getJabatanKaryawanbyId($id);
				echo $nama_jabatan;
			}
			else if($option==2)
			{
				$nama_jabatan=$this->KaryawanModelTrans->getJabatanKaryawanbyId($id);
				echo $nama_jabatan;
			}
		}
	//function API untuk menampilkan select Box lokasi Barang
	public function selectBox_lokasi()
	{
		$id = $this->input->post('id');
		$this->session->set_userdata('idlok',$id);
		$option = $this->input->post('op');
		if ($option==1)
			{ 	$lokasidetail=$this->LokasiModelTrans->getlokasidetail($id);
				 echo "<option value=''>----------------------------------Pilih Detail Ruangan----------------------------------------</option>";
				foreach($lokasidetail as $ld)
				{
					 echo "<option value='".$ld['id_detail_ruangan']."'>".$ld['detail_nama_ruangan']."</option>";
				}
				
			}
		else
		{
			
		}
	}	
	//function untuk menampilkan history data
		public function historyTransaksi()
		{if($_SESSION['status'] !== NULL){
			$data['title']="INVENTARIS YSI";
			$data['subtitle']="HISTORY TRRANSAKSI";
			$data['active']="HistoryTransaksi";
			$status=$_SESSION['status'];

			if($status==1)
			{
				$data['status']="admin";
			}
			else
			{
				$data['status']="direktur";	
			}
		//menampilkan seluruh data yang ada pada tabel data_transaksi dan ttransaksi
			$data['headermutasi']="HISTORY TRANSAKSI";
			$data['historytransaksi']=$this->TransaksiModel->getAllHistoryTransaksi();

			$this->blade->render('historyTransaksi',$data);
		}
		else
		{
			redirect('start/start');
		}	

	}
	//mengupdate data transaksi sebelum dicetak
	public function updatetransaksi()
	{
		if($_SESSION['status'] !== NULL){
			$data['title']="INVENTARIS YSI";
			$data['subtitle']="Transaksi Barang";
			$data['headerpencetakan']="SERAH TERIMA BARANG";
			$data['active']="TransaksiBarang";
			$ketbarang=$this->input->post('ket');
			$idbar=$_SESSION['idcode'];
			$status=$_SESSION['status'];
			if($status==1)
			{
				$data['status']="admin";
			}
			else
			{
				$data['status']="direktur";	
			}
			$id_transaksi=$this->input->post('idTransaksi');
			$idPenerima=$this->input->post('idPenerima');
			$idPenyerah=$this->input->post('idPenyerah');
			$nama_penerima=$this->KaryawanModelTrans->getNamaKaryawanbyId($idPenerima);
			$nama_penyerah=$this->KaryawanModelTrans->getNamaKaryawanbyId($idPenyerah);
			$ttransaksi=[
				'id_transaksi'=>$id_transaksi,
				'jabatan_penerima'=>$this->input->post('jabPenerima'),
				'jabatan_penyerah'=>$this->input->post('jabPenyerah'),
				'lokasi_peletakan'=>$this->input->post('lokasiBarang'),
				'nama_penerima'=>$nama_penerima,
				'nama_penyerah'=>$nama_penyerah,
				'tgl_peletakan'=>$this->input->post('tglPenyerah')
			];
			$setUpdateTransaksi=$this->TransaksiModel->setUpdateTransaksi($ttransaksi,$id_transaksi);

			$data['ttransaksi']=$this->TransaksiModel->getAllttransaksi($id_transaksi);
			$this->session->set_userdata('editbutton','<button type="button"  class="btn btn-success"  id="btntabeltransaksi"				>
				Edit Data Transaksi
				</button>');
			$data['daftar']=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);
			$data['karyawan']=$this->KaryawanModelTrans->getKaryawan();
			$this->blade->render('cetakTransaksi',$data);

		}
		else
		{
			redirect('start/start');
		}	
	}

	//function untuk insert data transaksi di table ttransaksi
	public function setTambah()
	{if($_SESSION['status'] !== NULL){
		$data['title']="INVENTARIS YSI";
		$data['subtitle']="Transaksi Barang";
		$data['headerpencetakan']="SERAH TERIMA BARANG";
		$data['active']="TransaksiBarang";
		$status=$_SESSION['status'];
		$this->session->set_userdata('syarat',1);
		if($status==1)
		{
			$data['status']="admin";
		}
		else
		{
			$data['status']="direktur";	
		}
		/*id_code merupakan nama session yang menunjukan array id barcode yang dipilih*/
		$idbar=$_SESSION['idcode'];
		$jumlah=count($idbar);
		$ketbar=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);
		$ket_bar="";
		//id lokasi yang didapat dari session yang ada di function selectBox_lokasi()
		$idlok=$_SESSION['idlok'];
		$id_detail_ruangan=$this->input->post('lokasiDetail');
		$nama_lokasi=$this->LokasiModelTrans->getnamalokasi($idlok);
		$nama_detail_ruangan=$this->LokasiModelTrans->getdetailruangan($id_detail_ruangan);

		foreach ($ketbar as $key) {
			$ket_bar.=$key['nama_barang'].":".$key['ket_barang'].",";
			//lokasi adalah lokasi awal yang diinpukan ditabel barangs
			$lokasi[]=$key['lokasi'];
			$lokasi_detail[]=$key['lokasi_detail'];
			//update tablebarang
			$idbarang=$key['id_barang'];
			$barangs=[
				'id_barang'=>$key['id_barang'],	
				'bahan'=>$key['bahan'],
				'cara_peroleh'=>$key['cara_peroleh'],
				'tanggal_pengadaan'=>$key['tanggal_pengadaan'],
				'warna_barang'=>$key['warna_barang'],
				'satuan'=>$key['satuan'],
				'keadaan_barang'=>$key['keadaan_barang'],
				'harga_satuan'=>$key['harga_satuan'],
				'tanggal_rusak'=>$key['tanggal_rusak'],
				'lokasi'=>$nama_lokasi,
				'lokasi_detail'=>$nama_detail_ruangan,
				'ket_barang'=>$key['ket_barang'],
				'pemilik'=>$key['pemilik'],
				'foto'=>$key['foto']
			];

			$update=$this->TransaksiModel->setUpdateBarangsbyId($idbarang,$barangs);

		}

		$idpenerima=$this->input->post('idpenerima');
		$idpenyerah=$this->input->post('idpenyerah');
		$nama_penyerah=$this->KaryawanModelTrans->getNamaKaryawanbyId($idpenyerah);
		$nama_penerima=$this->KaryawanModelTrans->getNamaKaryawanbyId($idpenerima);
		/*//lokasi ini berbentuk barang tergantung barang diletakan dimana
		$lokasipeletakan=array();
		$lokasipeletakan=$_POST['lokasibarang'];
	//perulangan cek lokasi
		$p=0;
		while($p<$jumlah){
			if($lokasipeletakan[$p]==$lokasipeletakan[$p+1])
			{

			}
		$p++;
		}
	//perulangan digunakan untuk mengisi pada tabel ttransaksi
		$k=0;
		while($k=0<$jumlah)
		{
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
		}*/
		

		$url=base_url('transaksi/datacetak/');

		$this->session->set_userdata('btncetakkuu',
			'<a href='.$url.'><button class="btn btn-info">Verifikasi</button></a>');
		


		$ttransaksi=[
			'jabatan_penerima'=>$this->input->post('jabpenerima'),
			'jabatan_penyerah'=>$this->input->post('jabpenyerah'),
			'ket'=>$ket_bar,
			'lokasi_peletakan'=>$nama_lokasi,
			'lokasi_detail'=>$nama_detail_ruangan,
			'nama_penerima'=>$nama_penerima,
			'nama_penyerah'=>$nama_penyerah,
			'tgl_peletakan'=>$this->input->post('tglpenyerah')
		];
		$this->TransaksiModel->setTambahttransaksi($ttransaksi);
		$id_transaksi=$this->TransaksiModel->get_idtransaksi();
		
	//perulangan yang membutuhkan session array id barcode dan diinput ketabel data_transaksi atau history barang
		$i=0;
		while($i<$jumlah)
			{$id=$idbar[$i];
				$datatransaksi=[
					'id_transaksi'=>$id_transaksi,
					'id_barcode'=>$id,
					'tanggal_peletakan'=>$this->input->post('tglpenyerah'),
					'lokasi_update'=>$nama_lokasi,
					'lokasi_sebelum'=>$lokasi[$i],
					'lokasi_detail_update'=>$nama_detail_ruangan,
					'lokasi_detail_sebelum'=>$lokasi_detail[$i]
				];
				$this->TransaksiModel->setTambahdatatransaksi($datatransaksi);
				$i++;
			}

			error_reporting(0);
			$data['daftar']=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);
		//Ambil id_transaksi
			$id_transaksi=$this->TransaksiModel->get_idtransaksi();
		//untuk mendapatkan data karyawan
			$data['karyawan']=$this->KaryawanModelTrans->getKaryawan();

		//ambil data di tabel ttransaksi
			$data['ttransaksi']=$this->TransaksiModel->getAllttransaksi($id_transaksi);
			$this->blade->render("transaksiBarang",$data);
			}
		else
		{
			redirect('start/start');
		}	
		}

		public function datacetak()
		{if($_SESSION['status'] !== NULL){
			$data['title']="INVENTARIS YSI";
			$data['subtitle']="Transaksi Barang";
			$status=$_SESSION['status'];
			$data['active']="TransaksiBarang";
			$idbar=$_SESSION['idcode'];
			$this->session->set_userdata('syarat',1);
			if($status==1)
			{
				$data['status']="admin";
			}
			else
			{
				$data['status']="direktur";	
			}
			$id_transaksi=$this->TransaksiModel->get_idtransaksi();
			$data['daftar']=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);
			$data['karyawan']=$this->KaryawanModelTrans->getKaryawan();

		//ambil data di tabel ttransaksi
			$data['ttransaksi']=$this->TransaksiModel->getAllttransaksi($id_transaksi);
			$this->blade->render("cetakTransaksi",$data);
				}
		else
		{
			redirect('start/start');
		}
		}

		public function printsertibar($index,$id_transaksi)
		{
			
			$pdf = new FPDF('P', 'mm', 'A4');
			$id_transaksi=$this->TransaksiModel->getTransaksi($id_transaksi);
		// membuat halaman baru

			$pdf->AddPage();
			$pdf->SetMargins(25, 5);
			$pdf->SetAutoPageBreak('on', 60);

			$image1 = base_url('assets/dist/img/Teladan.png');
			//$image2 = base_url('assets/dist/img/sinai.png');
		//$ctg = base_url('assets/dist/img/ctg.png');
		//$nctg = base_url('assets/dist/img/nctg.png');
			foreach ($id_transaksi as $k ) {
				$date=strtotime($k['tanggal_pengadaan']);
				$date_month[]=date('n',$date);
				$date_year[]=date('y',$date);

			}
		//Header
			//$pdf->Image($image2, 25, 4, 27);
			$pdf->Image($image1, 165, 4, 20);
			$pdf->Cell(0, 8, '', 0, 1);
			$pdf->SetFont('Times', 'B', 14);
			$pdf->Cell(0, 7, 'BERITA ACARA SERAH TERIMA BARANG', 0, 1, 'C');
			$pdf->Cell(0, 7, 'YAYASAN SINAI INDONESIA', 0, 1, 'C');
			$pdf->SetFont('Times', '', 12);
			$pdf->Ln(6);



		//Tabel head
			$pdf->cell(10, 6, 'No.', 1, 0);
			$pdf->cell(35, 6, ' Nama Barang', 1, 0);
			$pdf->cell(60, 6, 'Barcode', 1, 0);
			$pdf->cell(55, 6, 'Keterangan', 1, 1);

		//Tabel body
			$i=1;
			$j=0;
			foreach($id_transaksi as $key)
				{$nama_penerima=$key['nama_penerima'];
			$nama_penyerah=$key['nama_penyerah'];
			$jabatan_penyerah=$key['jabatan_penyerah'];
			$jabatan_penerima=$key['jabatan_penerima'];
			$tanggal_peletakan=$key['tanggal_peletakan'];
			$pdf->cell(10,6,$i,1,0);
			$pdf->cell(35,6,$key['nama_barang'],1,0);
			$pdf->cell(60,6,$key['id_barang'].'/'.$key['nama_departement'].'/'.$key['nama'].'/'.$date_month[$j].'/'.$date_year[$j],1,0);
			$pdf->cell(55,6,$key['ket_barang'],1,0);
			$pdf->Ln();
			$j++;
			$i++;
		}

		//Hari Tanggal
		$pdf->Ln(8);
		$pdf->Cell(240, 6, 'Yogyakarta, '.$tanggal_peletakan.' ', 0, 1,'C');;
		$pdf->Ln(1);
		//TTD
		$get_xxx = $pdf->GetX();
		$get_yyy = $pdf->GetY();
		$width_cell = 80;

		$pdf->multicell(80, 6, 'Yang menerima
			'.$jabatan_penerima.'


			'.$nama_penerima, 0, 'C');
		$get_xxx += $width_cell;
		$pdf->SetXY($get_xxx, $get_yyy);

		$pdf->multicell(80, 6, 'Yang menyerahkan
			'.$jabatan_penyerah.'


			'.$nama_penyerah, 0, 'C');
		$get_xxx += $width_cell;
		$pdf->SetXY($get_xxx, $get_yyy);


		$pdf->Ln(6);
		$pdf->Cell(0, 31, '', 0, 1);
		$pdf->Cell(0, 5, '___________________________________________________________________________', 0, 1);
		$pdf->Cell(0, 5, '', 0, 1);
		$pdf->cell(0, 5, '', 0, 1);
		$get_Y=$pdf->GetY();
		$get_X = $pdf->GetX();
		$pdf->SetXY($get_X, $get_Y);
//Header
		//$pdf->Image($image2, 25, 110, 27);
		$pdf->Image($image1, 165, 118, 20);
		$pdf->Cell(0, 8, '', 0, 1);
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(0, 7, 'BERITA ACARA SERAH TERIMA BARANG', 0, 1, 'C');
		$pdf->Cell(0, 7, 'YAYASAN SINAI INDONESIA', 0, 1, 'C');
		$pdf->SetFont('Times', '', 12);
		$pdf->Ln(6);


		
		//Tabel head
		$pdf->cell(10, 6, 'No.', 1, 0);
		$pdf->cell(35, 6, ' Nama Barang', 1, 0);
		$pdf->cell(60, 6, 'Barcode', 1, 0);
		$pdf->cell(55, 6, 'Keterangan', 1, 1);
		
		//Tabel body
		$i=1;
		$j=0;
		foreach($id_transaksi as $key)
		{
			$nama_penerima=$key['nama_penerima'];
			$nama_penyerah=$key['nama_penyerah'];
			$jabatan_penyerah=$key['jabatan_penyerah'];
			$jabatan_penerima=$key['jabatan_penerima'];
			$tanggal_peletakan=$key['tanggal_peletakan'];
			$pdf->cell(10,6,$i++,1,0);
			$pdf->cell(35,6,$key['nama_barang'],1,0);
			$pdf->cell(60,6,$key['id_barang'].'/'.$key['nama_departement'].'/'.$key['nama'].'/'.$date_month[$j].'/'.$date_year[$j],1,0);
			$pdf->cell(55,6,$key['ket_barang'],1,0);
			$pdf->Ln();
			$j++;
			$i++;
		}


		//Hari Tanggal
		$pdf->Ln(8);
		$pdf->Cell(240, 6, 'Yogyakarta, '.$tanggal_peletakan.' ', 0, 1,'C');;;
		$pdf->Ln(1);
		//TTD
		$get_xxx = $pdf->GetX();
		$get_yyy = $pdf->GetY();
		$width_cell = 80;


		$pdf->multicell(80, 6, 'Yang menerima
			'.$jabatan_penerima.'


			'.$nama_penerima, 0, 'C');
		$get_xxx += $width_cell;
		$pdf->SetXY($get_xxx, $get_yyy);

		$pdf->multicell(80, 6, 'Yang menyerahkan
			'.$jabatan_penyerah.'


			'.$nama_penyerah, 0, 'C');
		$get_xxx += $width_cell;
		$pdf->SetXY($get_xxx, $get_yyy);

		$kode = $index;
		if ($kode == '1')
			$pdf->Output('D', 'SuratSertibar.pdf');
		else if ($kode == '0')
			$pdf->Output('I', 'SuratSertibar.pdf');

	}

	public function printbarcode($index)
	{
		$idbar=$_SESSION['idcode'];		
		$daftar=$this->TransaksiModel->getAllbyIdbarcodewherein($idbar);
		foreach ($daftar as $key) {
			$date=strtotime($key['tanggal_pengadaan']);
			$date_month=date('n',$date);
			$date_year=date('y',$date);
			$nama_barang[]=$key['nama_barang'];
			$coder[]=$key['id_barang'].$key['id_yayasan'].$key['id_departement'].$date_month.$date_year;
		}
		
		
		$hitung=count($coder);
		
		

		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		$i=0;
		$hitung=count($coder);
		While($i<$hitung)
		{		
			file_put_contents('assets/dist/img/barcode/'.$coder[$i].'.jpg', $generator->getBarcode($coder[$i],$generator::TYPE_CODE_128));
			$i++;
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

		//Barcode
		$j=0;
		$y=50;
		$t=30;

		while($j<$hitung)
		{
			$image=base_url('assets/dist/img/barcode/'.$coder[$j].'.jpg');
			$k=0;
			$x=25;
			$get_c=10;
			$pdf->Cell($get_c, $t,$nama_barang[$j], 0,1);
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


}
