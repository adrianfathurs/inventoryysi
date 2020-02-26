 @layout('template/main/transaksi/main')
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
    <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
    <?= $this->session->tempdata('messaggecektransaksi');?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <div class="card-header">
         <h5 class=" mb-2 text-gray-800">{{$headermutasi}}</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><center>Download</center></th>
                <th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Merk</center></th>
                <th><center>No. Pabrik</center></th>
                <th><center>Ket Barang</center></th>
                <th><center>TGL Rusak</center></th>
                <th><center>TGL Mutasi</center></th>
                <th><center>Lokasi Sekarang</center></th>
                <th><center>Lokasi Sebelum</center></th>
                <th><center>Nama Menyerahkan</center></th>
                <th><center>Jabatan Menyerahkan</center></th>
                <th><center>Nama Penerima</center></th>
                <th><center>Jabatan Penerima</center></th>
              </tr>
            </thead>
            <tbody id="bodyTable">
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
              <?php $i=1;foreach($historytransaksi as $h):?>
                <tr>
                  <?php $download='1';$id_transaksi=$h['id_transaksi'];?>
                  <td><a href="{{base_url('transaksi/printsertibar/').$download.'/'.$id_transaksi}}"><button class="btn btn-primary">Sertibar</button></a></td>
                  <td>{{$i}}</td>
                  <td><center><?=strtoupper($h['nama_barang'])?></center></td>
                  <td><center><?=strtoupper($h['merk'])?></center></td>
                  <td><center><?=strtoupper($h['no_pabrik'])?></center></td>
                  <td><center><?=strtoupper($h['ket_barang'])?></center></td>
                  <td><center><?=strtoupper($h['tanggal_rusak'])?></center></td>
                  <td><center><?=strtoupper($h['tanggal_peletakan'])?></center></td>
                  <td><center><?=strtoupper($h['lokasi_update'])?></center></td>
                  <td><center><?=strtoupper($h['lokasi_sebelum'])?></center></td>
                  <td><center><?=$h['nama_penyerah']?></center></td>
                  <td><center><?=$h['jabatan_penyerah']?></center></td>
                  <td><center><?=strtoupper($h['nama_penerima'])?></center></td>
                  <td><center><?=strtoupper($h['jabatan_penerima'])?></center></td>
                </tr>
              <?php $i++;endforeach;?>
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