  @layout('template/main/transaksi/main')

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
    #containers{
      display: none;
    }
    #exampleModalCenter
      {
        display:none;
        position: fixed;
      }
    #qrcode
    {
      display: none;
    }
    #barcode
    {
      display: none;
    }
   </style>
 @endsection

 @section('scripts-js')
   <script >
    $(document).ready(function(){
      $("#hide").click(function(){
        $("#containers").hide();
      });
      $("#btnqrcode").click(function(){
        $("#barcode").hide();
        $("#qrcode").fadeIn(1000);
      });
      $("#btnbarcode").click(function(){
        $("#qrcode").hide();
        $("#barcode").fadeIn(1000);
      });
      $(".btnback").click(function(){
        $("#qrcode").hide();
        $("#barcode").hide();
      });

      $("#submit").click(function(){
        alert("Terimakasih,Data Anda Telah Direkam");
      });
    $("#jsform").click(function(){
        $("#containers").show();
      });
    });
  </script>
@endsection
 

  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="card-header">
                  <a href="{{base_url('barang/daftarbarang/')}}"><i class="fas fa-arrow-circle-left fa-2x" id="icon"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Merk</th>
                      <th>No Pabrik</th>
                      <th>Bahan</th>
                      <th>Cara Peroleh</th>
                      <th>Perolehan</th>
                      <th>Warna Barang</th>
                      <th>Satuan</th>
                      <th>Keadaan Barang</th>
                      <th>Harga/satuan</th>
                      <th>Tgl_rusak</th>
                      <th>Lokasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
                    <?php foreach($daftar as $d):
                   
                    ?>
                    
                    <tr>
                      <td>1</td>

                     <?php 

                        $id=$d['id_barcode'];
                        $id_barang=$d['id_barang'];
                         $date=strtotime($d['tanggal_pengadaan']);
                          $date_month=date('M',$date);
                          $date_year=date('y',$date);
                     ?>
                      <td><?=$d['nama_barang']?></td>
                      <td><?=$d['merk']?></td>
                      <td><?=$d['no_pabrik']?></td>
                      <td><?=$d['bahan']?></td>
                      <td><?=$d['cara_peroleh']?></td>
                      <td><?=$d['tanggal_pengadaan']?></td>
                      <td><?=$d['warna_barang']?></td>
                      <td><?=$d['satuan']?></td>
                      <td><?=$d['keadaan_barang']?></td>
                      <td><?=$d['harga_satuan']?></td>
                      <td><?=$d['tanggal_rusak']?></td>
                      <td><?=$d['lokasi']?></td>
                      <td><!-- update lokasi -->
                          <a href="{{base_url('barang/selectidbarcode/').$id.'/'.$id_barang}}"><i class="fas fa-edit fa-2x"></i></a>
                      </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>

              </div>
                  
              
                <div class="row">
                  <div class="col-3">
                    <div class="card" style="width: 20rem;">        
                      <div class="card-body">
                        <h5 class="card-title"><strong>Lihat</strong></h5><br>
                        <!-- button buat cetak barcode -->
                        <button type="button" class="btn btn-info" id="btnbarcode">Barcode</button>
                        <!-- button buat cetak qrcode -->
                        <button type="button" class="btn btn-info" id="btnqrcode">QRcode</button>  
                        <!-- button buat ngeshow form serah terima barang -->
                        <button type="button" class="btn btn-info" id="jsform">Form Sertibar</button>  
                      </div>
                    </div>
                 </div>

                 <div class="col-2">
                  <!-- fungsinya digunakan untuk cetakQrcode  -->
                  <div class="card" id="qrcode" style="width: 13rem;">        
                      <div class="card-body">
                        <h5 class="card-title"><strong>QRcode</strong></h5><br>
                        <button type="button" class="btn btn-light" id="btnqrcode"><img src="{{base_url('temp/').$kode.'.png'}}" width="50px" height="50px"></img></button> 
                        <button type="button" class="btn btn-success" id="btndownloadqrcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                        <button type="button" class="btn btn-info btnback" ><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                      </div>
                  </div>
                  <!-- fungsinya untuk cetak Barcode -->
                  <div class="card" id="barcode" style="width: 16rem;">        
                      <div class="card-body">
                        <h5 class="card-title"><strong>Barcode</strong></h5><br>
                        <button type="button" class="btn btn-light" id="btnbarcode"><img src="{{base_url('temp/barcode/').$kode.'.jpg'}}" width="100px" height="50px"></img></button> 
                        <button type="button" class="btn btn-success" id="btndownloadbarcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                        <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                         
                      </div>
                  </div>
                </div>
                <div class="col-"></div>
              </div>
            



<?= var_dump($kode);?>

              </div>
            </div>
          </div>


  <div class="container" id="containers">
    <div class="card card-register mx-auto mt-5">
      <button type="button" class="btn btn-info" id="hide">Hide</button>
      <center>
      <div class="card-header">Form Berita Acara Serah Terima</div>
      </center>
      <div class="card-body">
        <form id="form" method="POST" action="{{base_url('transaksi/setTambah/').$id}}">
          <div class="form-group">   
            <div class="form-label-group">
              <label for="barcodeBarang">Kode Barang</label>
              <input type="text" id="barcodeBarang" class="form-control" placeholder="{{$id.'/'.$d['id_barang'].'/'.$d['id_departement'].'/'.$d['id_yayasan'].'/'.$date_month.'/'.$date_year}}" required="required" autofocus="autofocus" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="ygMenyerahkan">Nama yang Menyerahkan</label>
              <input type="text" id="ygMenyerahkan" class="form-control" placeholder="Nama yang Menyerahkan" required="required " name="penyerah">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="jabMenyerahkan">Jabatan yang Menyerahkan</label>
              <input type="text" id="jabMenyerahkan" class="form-control" placeholder="Jabatan yang Menyerahkan" required="required" name="jabpenyerah">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="ygMenerima">Nama Penerima</label>
              <input type="text" id="ygMenerima" class="form-control" placeholder="Nama Penerima" required="required" name="penerima">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="jabMenyerahkan">Jabatan Penerima</label>
              <input type="text" id="jabMenyerahkan" class="form-control" placeholder="Jabatan Penerima" required="required" name="jabpenerima">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="lokasiBarang">Lokasi Barang</label>
              <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Barang" required="required" name="lokasibarang" >
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="tglPenyerahan">Tanggal Penyerahan Barang</label>
              <input type="date" id="tglPenyerahan" class="form-control" placeholder="Tanggal Penyerahan Barang" required="required" name="tglpenyerah">
            </div>
          </div>
          <div class="form-group">
        <textarea class="form-control" id="ketBarang" rows="3" placeholder="Keterangan" required="required" name="ket"></textarea>
        
      </div>          
              <button class="btn btn-primary" id="submit">Submit</button>
                    
        </form>
      </div>
    </div>
  </div>

       



      <!-- End of Main Content -->
@endsection
