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
   </style>
 @endsection

 @section('scripts-js')
   <script >
    $(document).ready(function(){
      $("#hide").click(function(){
        $("#containers").hide();
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
                    </tr>
                    <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>

              </div>
                    <div class="card" style="width: 20rem;">        
                      <div class="card-body">
                        <h5 class="card-title"><strong>Cetak</strong></h5><br>
                        <!-- button buat cetak barcode -->
                        <button type="button" class="btn btn-info">Barcode</button>
                        <!-- button buat cetak qrcode -->
                        <button type="button" class="btn btn-info">QRcode</button>  
                        <!-- button buat ngeshow form serah terima barang -->
                        <button type="button" class="btn btn-info" id="jsform">Form Sertibar</button>  
                      </div>
                    </div>
                  </div>
                
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
        <form>
          <div class="form-group">   
            <div class="form-label-group">
              <label for="barcodeBarang">Kode Barang</label>
              <input type="text" id="barcodeBarang" class="form-control" placeholder="{{$id.'/'.$d['id_barang'].'/'.$d['id_departement'].'/'.$d['id_yayasan'].'/'.$date_month.'/'.$date_year}}" required="required" autofocus="autofocus" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="ygMenyerahkan">Nama yang Menyerahkan</label>
              <input type="text" id="ygMenyerahkan" class="form-control" placeholder="Nama yang Menyerahkan" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="jabMenyerahkan">Jabatan yang Menyerahkan</label>
              <input type="text" id="jabMenyerahkan" class="form-control" placeholder="Jabatan yang Menyerahkan" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="ygMenerima">Nama Penerima</label>
              <input type="text" id="ygMenerima" class="form-control" placeholder="Nama Penerima" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="jabMenyerahkan">Jabatan Penerima</label>
              <input type="text" id="jabMenyerahkan" class="form-control" placeholder="Jabatan Penerima" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="lokasiBarang">Lokasi Barang</label>
              <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Barang" required="required" >
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="tglPenyerahan">Tanggal Penyerahan Barang</label>
              <input type="date" id="tglPenyerahan" class="form-control" placeholder="Tanggal Penyerahan Barang" required="required">
            </div>
          </div>
          <div class="form-group">
        <textarea class="form-control" id="ketBarang" rows="3" placeholder="Keterangan" required="required"></textarea>
        
      </div>
          
          <a class="btn btn-success btn-block" href="login.html">Input/Submit</a>
        </form>
      </div>
    </div>
  </div>

       



      <!-- End of Main Content -->
@endsection
