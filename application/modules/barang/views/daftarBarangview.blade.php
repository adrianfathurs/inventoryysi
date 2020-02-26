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
                  $date=strtotime($d['tanggal_pengadaan']);
                  $date_month=date('n',$date);
                  $date_year=date('y',$date);
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
                  <td><center><?=$d['tanggal_pengadaan']?></center></td>
                  <td><center><?=strtoupper($d['warna_barang'])?></center></td>
                  <td><center><?=strtoupper($d['satuan'])?></center></td>
                  <td><center><?=strtoupper($d['keadaan_barang'])?></center></td>
                  <td><center><?=$d['harga_satuan']?></center></td>
                  <td><center><?=$d['tanggal_rusak']?></center></td>
                  <td><center><?=strtoupper($d['lokasi'])?></center></td>
                  <td><center><img src="{{base_url('assets/dist/img/imgbarang/').$d['foto']}}" width="80" height="80"></center></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <!-- CArd view Lihart History Barang -->
          <div class="card" style="width: 15rem;">
            <div class="card-header py-2">
              <h5 class="card-title" style="margin: center"><strong>Lihat</strong></h5>
            </div>
            <a href="{{base_url('barang/historymutasi')}}">
            <div class="card-body">
              <button class="btn btn-info" id="btnHistory">History Mutasi Barang</button>
            </div>
            </a>
          </div>
          
          <!-- ------------------------------- -->
        </div>
      </div>
    </div>
  </div> 
</div>
  
<!-- End of Main Content -->
@endsection
<!-- script js -->
@section('scripts-js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
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