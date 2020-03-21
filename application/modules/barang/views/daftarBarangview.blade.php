  @layout('template/main/barang/main')
  <!-- script css -->
  @section('scripts-css')
  <style type="text/css">
    .selecting{
      color:#000000;
    }
    .selecting:hover{
      color:#7CFC00;  
    }
    .deleting{
      color: red;
    }
    #exampleModalCenterTitle
    {
      display:none;
      position: fixed;
    }
    #btncheckbox{
      margin-top: 20px;
      margin-left: 40px;
    }
  </style>
  @endsection
  
  @section('content')
  <!-- Begin Page Content -->
  <!-- TABLE BARANGNYA -->
  <div class="container-fluid">
    <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <div class="card-header">
        <h5 class="mb-2">{{$subtitle}}</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><center>Lihat</center></th>
                <th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Merk</center></th>
                <th><center>No. Pabrik</center></th>
                <th><center>Bahan</center></th>
                <th><center>Cara Peroleh</center></th>
                <th><center>TGL Perolehan</center></th>
                <th><center>Warna Barang</center></th>
                <th><center>Satuan</center></th>
                <th><center>Keadaan Barang</center></th>
                <th><center>Harga/Satuan</center></th>
                <th><center>TGL Rusak</center></th>
                <th><center>Lokasi Barang</center></th>  
                <th><center>Lokasi Detail</center></th>  
                <th><center>Pemilik</center></th>  
                <th><center>Foto</center></th>  
              </tr>
            </thead>
            <tbody id="bodyTable">
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
              <?php foreach($daftar as $d):?>
                <tr>
                  <?php 
                  $id=$d['id_barcode'];
                  $idbarang=$d['id_barang'];
                  $iddepartement=$d['id_departement'];
                  $idyayasan=$d['id_yayasan'];
                  $harga_satuan=base_url('barang/convert_to_rupiah/').$d['harga_satuan'];
                  /////////////////////////////////////////
                  $date=strtotime($d['tanggal_pengadaan']);
                  $date_month=date('n',$date);
                  $date_year=date('y',$date);
                  //convert format tanggal_pengadaan
                  $tanggal_Pengadaan= date('d-m-Y', $date);
                  //convert format tanggal_rusak
                  $tanggalrusak=$d['tanggal_rusak'];
                  if(isset($tanggalrusak))
                  {
                    $tanggalrusak=strtotime($d['tanggal_rusak']);
                    $tanggal_Rusak=date('d-m-Y',$tanggalrusak);

                  }
                  else
                  {
                   $tanggal_Rusak=$d['tanggal_rusak'];
                 }

                  ////////////////////////////////////////
                 ?>
                 <td>
                  <form action="{{base_url('barang/tampilcode')}}" method="POST">
                    <input type="hidden" name="idbarcode" id="idbarcode" value="{{$id}}">
                    <input type="hidden" name="idbarang" id="idbarang" value="{{$idbarang}}">
                    <input type="hidden" name="date_month" id="date_month" value="{{$date_month}}">
                    <input type="hidden" name="date_year" id="date_year" value="{{$date_year}}">
                    <button type="submit" class="btn btn-primary"id="btncode" >Code</button>
                  </form>
                </td>
                <td>{{$d['id_barcode']}}</td>
                <td><center><?=strtoupper($d['nama_barang'])?></center></td>
                <td><center><?=strtoupper($d['merk'])?></center></td>
                <td><center><?=strtoupper($d['no_pabrik'])?></center></td>
                <td><center><?=strtoupper($d['bahan'])?></center></td>
                <td><center><?=strtoupper($d['cara_peroleh'])?></center></td>
                <td><center><?=$tanggal_Pengadaan?></center></td>
                <td><center><?=strtoupper($d['warna_barang'])?></center></td>
                <td><center><?=strtoupper($d['satuan'])?></center></td>
                <td><center><?=strtoupper($d['keadaan_barang'])?></center></td>
                <td><center><?='Rp.'.number_format($d['harga_satuan'],2,",",".");?></center></td>
                <td><center><?=$tanggal_Rusak?></center></td>
                <td><center><?=strtoupper($d['lokasi'])?></center></td>
                <td><center><?=strtoupper($d['lokasi_detail'])?></center></td>
                <td><center><?=strtoupper($d['pemilik'])?></center></td>
                <td><center><img src="{{base_url('assets/dist/img/imgbarang/').$d['foto']}}" width="80" height="80"></center></td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
</div>

<!-- End of Main Content -->
@endsection
<!-- script js -->
@section('scripts-js')
<script type="text/javascript" charset="utf8" src="{{base_url('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script>
  $(document).ready(function(){
    var table = $('.dataTable').DataTable();

    $('#dataTable tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected'); });
    var rowData = table.row( this ).data();
    $('#btncheckbox').click( function() {

    });
  }); 
</script>
@endsection