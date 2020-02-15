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
  <!-- TABLE HISTORI MUTASI BARANG -->
  <div class="container-fluid">
    <?= $this->session->tempdata('messaggecektransaksi');?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <div class="card-header">
        <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$headermutasi}}</strong></h1></center>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Merk</center></th>
                <th><center>No. Pabrik</center></th>
                <th><center>TGL Rusak</center></th>
                <th><center>Ket Barang</center></th>
                <th><center>TGL Pengadaan</center></th>
                <th><center>TGL Mutasi</center></th>
                <th><center>Lokasi Sekarang</center></th>
                <th><center>Lokasi Sebelum</center></th>
                
              </tr>
            </thead>
            <tbody id="bodyTable">
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
              <?php $i=0;foreach($transaksi as $t):?>
                <tr>
                  <td>{{$i++}}</td>
                  <td><center><?=strtoupper($t['nama_barang'])?></center></td>
                  <td><center><?=strtoupper($t['merk'])?></center></td>
                  <td><center><?=strtoupper($t['no_pabrik'])?></center></td>
                  <td><center><?=strtoupper($t['tanggal_rusak'])?></center></td>
                  <td><center><?=strtoupper($t['ket_barang'])?></center></td>
                  <td><center><?=$t['tanggal_pengadaan']?></center></td>
                  <td><center><?=strtoupper($t['tanggal_peletakan'])?></center></td>
                  <td><center><?=strtoupper($t['lokasi_update'])?></center></td>
                  <td><center><?=strtoupper($t['lokasi_sebelum'])?></center></td>
                  
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
         
        </div>
      </div>
    </div>
  </div> 
  

  <!-- ####################################################################################################################### -->
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