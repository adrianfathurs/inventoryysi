  @layout('template/main/transaksi/main')

  @section('scripts-css')
     <link rel="stylesheet" href="{{base_url('assets/plugins/select2/css/select2.min.css')}}">
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
    #iconhidden
    {
      display: none;
        z-index: 2;
    }
    #barcode
    {
      display: none;
    }
   /* #cetakqrdanbarcode
    {
      display: none;
    }*/
    #suratsertibar
    {
      display: none;
      
      z-index: 1;
    }
   </style>
 @endsection


 

  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="card-header">
                <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>
                  <a href="{{base_url('barang/daftarbarang/')}}"><i class="fas fa-arrow-circle-left fa-2x" id="icon"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <?php if($status=="admin"):?>
                      <th><center>EDIT</center></th>
                    <?php endif;?>
                    <?php if($status=="direktur"):?>
                      <th><center>LIHAT</center></th>
                    <?php endif;?>
                    
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
                    </tr></center>
                  </thead>
                  <tbody>
                  <!-- <form method="POST" action="{{base_url('barang/selectidbarcode/')}}"> -->   
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
                    <?php $j=1;foreach($daftar as $k =>$d):?>
                    <tr>
                      
                        <?php 
                          //$idbark untuk membungkus id barcode looping menjadi array
                           $idbark=array($k=>$d['id_barcode']);
                           $idbar=$d['id_barcode'];
                           $id=$d['id_barcode'];
                          
                          $id_barang=$d['id_barang'];
                          $id_dept=$d['id_departement'];
                          $id_yayasan=$d['id_yayasan'];
                          $date=strtotime($d['tanggal_pengadaan']);
                          $date_month=date('m',$date);
                          $date_year=date('y',$date);
                        ?>
                      <td>
                      <!-- update lokasi -->
                        <a href="{{base_url('barang/selectidbarang/').$id.'/'.$id_barang.'/'.$id_dept.'/'.$id_yayasan.'/'.$date_month.'/'.$date_year}}">
                          <center><i class="fas fa-edit fa-1x"></i></center>
                        </a>     
                      </td>
                      <td>{{$j}}</td>
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
                      
                    </tr>
                     <!--  <input type="hidden" name="idbar[]" value="{{$id}}"> -->
                    <?php $j++;endforeach;?> 
                    <!-- Belum JAdi masih memikirkan gimana caranya agar 2 id barcode fdapat di parsing -->
                      <!-- <input type="hidden" name="idbar[]" value="{{$d['id_barcode']}}"> -->
                  </tbody>
                </table>
              </div>
                  
                
                <div class="row">
                  <div class="col-sm-4-mx-auto">
                    <div class="card" style="width: 10rem;"><br>      
                      <h5 class="card-title"><strong><center>Lihat</center></strong></h5>
                        <div class="card-body">
                        <!-- button buat cetak barcode
                        <button type="button" class="btn btn-info" id="btnbarcode">Barcode</button>
                         button buat cetak qrcode 
                        <button type="button" class="btn btn-info" id="btnqrcode">QRcode</button> 
                        -->
                              <!-- button buat ngeshow form serah terima barang -->
                              <center><button type="button" class="btn btn-info" id="jsform">Form Sertibar</button></center>                          
                        </div><!-- div row -->
                    </div>
                  </div>

                  <div class="col-sm-4-mx-auto">
                    <div class="card" style="width: 25rem;"><br>      
                      <h5 class="card-title"><strong><center><?= $this->session->userdata('cardcetak'); ?></center></strong></h5>
                        <div class="card-body">
                        <!-- button buat cetak barcode
                        <button type="button" class="btn btn-info" id="btnbarcode">Barcode</button>
                         button buat cetak qrcode 
                        <button type="button" class="btn btn-info" id="btnqrcode">QRcode</button> 
                        -->
                              <!-- button buat ngeshow form serah terima barang -->
                              <?= $this->session->userdata('cetak');?>                          
                        </div><!-- div row -->
                    </div>
                  </div>
                </div>

                <!-- Apabila interface nya barcode dan qrcode berada di view transaksi barang -->
                 <!-- <div class="col-sm-8-mx-auto">
                   fungsinya digunakan untuk cetakQrcode  
                  <div class="card" id="qrcode" style="width: 16rem;">        
                      <div class="card-body-mx-auto">
                        <h5 class="card-title" ></h5><br>
                        <center><strong>QRcode</strong></center>
                        <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                        <div class="printqrcode">
                        <img src="{{base_url('temp/').$kode.'.png'}}" width="55px" height="55px"  alt="Qrcode"></img></div>
                        </div>
                       
                        <div class="col-6">
                        <button type="button" class="btn btn-success" id="btndownloadqrcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                        <button type="button" class="btn btn-info btnback" ><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                      </div>
                      </div>
                      </div>
                  </div>
                  fungsinya untuk cetak Barcode 
                  <div class="card" id="barcode" style="width: 16rem;">        
                      <div class="card-body">
                        <h5 class="card-title"><strong>Barcode</strong></h5><br>
                        <button type="button" class="btn btn-light" id="btnbarcode"><img src="{{base_url('temp/barcode/').$kode.'.jpg'}}" width="100px" height="50px"></img></button> 
                        <button type="button" class="btn btn-success" id="btndownloadbarcode"><i class="fas fa-fw fa-download fa-2x"></i></button> 
                        <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-2x"></i></button> 
                         
                      </div>
                  </div>
                </div>
                <div class="col"></div>-->
              </div> <!-- div row -->
  
              </div>
            </div>
          </div>


  <div class="container-fluid" id="containers">
    <div class="card card-register mx-auto mt-5">
      <button type="button" class="btn btn-info" id="hide">Hide</button>
      <center>
      <h5 class="card-header">Form Berita Acara Serah Terima</h5>
      </center>
      <div class="card-body">
        <form id="form" method="POST" action="{{base_url('transaksi/setTambah/').$id}}">
          <!-- tidak membutuhkan view kode barang karena setelah di proses nantinta kode barang akan tampil di print fpdf -->
          <!-- <div class="form-group">   
            <div class="form-label-group">
              <label for="barcodeBarang">Kode Barang</label>
              <input type="text" id="barcodeBarang" class="form-control" placeholder="{{$id.'/'.$d['id_barang'].'/'.$d['id_departement'].'/'.$d['id_yayasan'].'/'.$date_month.'/'.$date_year}}" required="required" autofocus="autofocus" readonly="readonly">
            </div>
          </div> -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <div class="form-label-group">
                  <label for="ygMenyerahkan">Nama yang Menyerahkan</label><br>
                  <!-- <input type="text" id="ygMenyerahkan" class="form-control" placeholder="Nama yang Menyerahkan" required="required " name="penyerah"> -->
                  <select class=" select2 form-control " name="idpenyerah" id="nama_penyerah">
                    <option value="">--------Pilih Nama---------</option>
                    <?php foreach ($karyawan as $key): ?>
                      <option value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="jabMenyerahkan">Jabatan yang Menyerahkan</label><br>
                  
                  <input type="text" class=" form-control " readonly="true" name="jabpenyerah" id="jabMenyerahkan">    
                  </input>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <div class="form-label-group">
                  <label for="nama_penerima">Nama Penerima</label><br>
                  
                  <!-- <input type="text" id="ygMenerima" class="form-control" placeholder="Nama Penerima" required="required" name="penerima"> -->
                
                  <select class="form-control select2" id="nama_penerima" name="idpenerima">
                    <option value="">--------Pilih Nama---------------------------------</option>
                    <?php foreach ($karyawan as $key): ?>
                      <option class="form control"value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
                    <?php endforeach?>
                  </select>
                 </div> 
                
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="jabPenerima">Jabatan Penerima</label>
                  <input type="text" class=" form-control " readonly="true" name="jabpenerima" id="jabPenerima">    
                  </input>
                </div>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-3">
            <div class="form-group">
              <div class="form-label-group">
                <label for="lokasiBarang">Lokasi Peletakan </label>
                <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Peletakan " required="required" name="lokasibarang" >
              </div>
            </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <div class="form-label-group">
                  <label for="tglPenyerahan">Tanggal Penyerahan Barang</label>
                  <input type="date" id="tglPenyerahan" class="form-control" placeholder="Tanggal Penyerahan Barang" required="required" name="tglpenyerah">
                </div>
              </div>
            </div>
          </div>
          <!-- keterangan barang diambil dari id barang yang telah dipilih dan berasal dari table barangs nantinya dimasukan di table ttransaksi -->
          <?php $j=1;foreach($daftar as $k =>$d):?>
          <div class="form-group">
            <div class="form-group">
                <div class="form-label-group">
                  <label for="keterangan">Keterangan Barang {{$d['nama_barang']}}</label>
                  <textarea class="form-control" rows="3" placeholder="{{$d['ket_barang']}}" required="required" name="ket[]" readonly="true" value="{{$d['ket_barang']}}"></textarea>
                </div>
              </div>
            </div>
            <?php $j++; endforeach;?>


             
        
          </div>          
              <button type="submit" class="btn btn-success" id="submit">Submit</button>
                    
        </form>
      </div>
    </div>
  </div>

<!-- Form untuk cetak sertibar tetapi di hidden -->
   <div class="container-fluid " id="iconhidden">
    <div class="card card-register mx-auto mt-5">
    <button class="btn btn-info"><i class="fas fa-arrow-circle-up fa-2x"></i></button>
  </div>
  </div> 
  
  <div class="container-fluid" id="suratsertibar">   
    <div class="card card-register mx-auto mt-5">
     
      <center><h2 class="card-header">YAYASAN SINAI INDONESIA</h2></center>
      <hr>
        <div class="card-body">
          <div class="col-md-20 mt-3">
            <table border="2" class="table table-bordered table-light ">
              <thead>
                <tr>
                  <th>
                    <center>No.</center>
                  </th>
                  <th>
                    <center>Nama Barang</center>
                  </th>
                  <th>
                    <center>Barcode</center>
                  </th>
                  <th>
                    <center>Keterangan</center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php error_reporting(0);?>
                <?php foreach($ttransaksi as $tr):?>
                  <?php $i=1;foreach($daftar as $k =>$c):
                   $date=strtotime($d['tanggal_pengadaan']);
                                $date_month=date('M',$date);
                                $date_year=date('y',$date);
                  ?>
                    <tr>
                      <td><center>{{$i}}</center></td>
                      <td>{{$c['nama_barang']}}</td>
                      <td>{{$c['id_barang'].'/'.$c['id_departement'].'/'.$c['id_yayasan'].'/'.$date_month.'/'.$date_year}}</td>
                      <td>{{$c['keadaan_barang']}}</td>
                    </tr>
                  <?php $i++;endforeach;?>
              </tbody>
            </table>
                  <br>
                  <div class="col-md-20 mt-3">
                    <table class="table" >
                    <tbody>
                      <tr>
                        <td>
                          <br>
                          <center>Yang Menyerahkan</center>
                          <center>Staff Teknologi Informasi</center>
                          <br><br><br>
                          <center>{{$tr['nama_penyerah']}}</center> <!-- dinamis -->
                        </td>
                        <td>
                          <center>Yogyakarta, {{$tr['tgl_peletakan']}}</center> <!-- dinamis -->
                          <center>Yang Menerima</center>
                          <br><br><br><br>
                          <center>{{$tr['nama_penerima']}}</center> <!-- dinamis -->
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <?php endforeach;?>
                  </div>
          </div>
      </div>
      <hr>
      <center><h2 class="card-header">YAYASAN SINAI INDONESIA</h2></center>
      <div class="card-body">
          <div class="col-md-20 mt-3">
            <table border="2" class="table table-bordered table-light ">
              <thead>
                <tr>
                  <th>
                    <center>No.</center>
                  </th>
                  <th>
                    <center>Nama Barang</center>
                  </th>
                  <th>
                    <center>Barcode</center>
                  </th>
                  <th>
                    <center>Keterangan</center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php error_reporting(0);?>
                <?php foreach($ttransaksi as $tr):?>
                  <?php $i=1;foreach($daftar as $k =>$c):
                   $date=strtotime($d['tanggal_pengadaan']);
                                $date_month=date('M',$date);
                                $date_year=date('y',$date);
                  ?>
                    <tr>
                      <td><center>{{$i}}</center></td>
                      <td>{{$c['nama_barang']}}</td>
                      <td>{{$c['id_barang'].'/'.$c['id_departement'].'/'.$c['id_yayasan'].'/'.$date_month.'/'.$date_year}}</td>
                      <td>{{$c['keadaan_barang']}}</td>
                    </tr>
                  <?php $i++;endforeach;?>
              </tbody>
            </table>
                  <br>
                  <div class="col-md-20 mt-3">
                    <table class="table" >
                    <tbody>
                      <tr>
                        <td>
                          <br>
                          <center>Yang Menyerahkan</center>
                          <center>Staff Teknologi Informasi</center>
                          <br><br><br>
                          <center>{{$tr['nama_penyerah']}}</center> <!-- dinamis -->
                        </td>
                        <td>
                          <center>Yogyakarta, {{$tr['tgl_peletakan']}}</center> <!-- dinamis -->
                          <center>Yang Menerima</center>
                          <br><br><br><br>
                          <center>{{$tr['nama_penerima']}}</center> <!-- dinamis -->
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <?php endforeach;?>
                  </div>
          </div>
      </div>
  </div>
</div>



      <!-- End of Main Content -->
@endsection

@section('scripts-js')
  <script src="{{base_url('assets/plugins/jquery/jquery.PrintArea.js')}}"></script>
   
   <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
   <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
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

      /*$("#btndownloadqrcode").click(function(){
        $("#printqrcode").print(); //Untuk Print Area tertentu bisa menggunakan code ini
        //window.print();
      });*/
      $("#cetaksertibar").click(function(){
        $("#suratsertibar").show();
        $("#iconhidden").show();
        $("#suratsertibar").printArea();
      });

      $("#iconhidden").click(function(){
          $("#suratsertibar").hide();
          $("#iconhidden").hide();

      });
      
      $("#btndownloadqrcode").click(function() {
              // cetak data pada area <div id="#data-mahasiswa"></div>
              $('.printqrcode').printArea();
       });



      $("#submit").click(function(){
       // alert("Terimakasih,Data Anda Telah Direkam");
        $("#cetaksertibar").show();
        $("#cetakqrdanbarcode").show();
      });
    $("#jsform").click(function(){
        $("#containers").show();
      });

  

    
  
    
       
});
</script>

<script>
$(document).ready(function() {
        $("#nama_penyerah").change(function() {
            
            var postForm = {
                    'id': document.getElementById("nama_penyerah").value,
                    'op': 1
            };
            $.ajax({
                type: "post",
                url: 'http://localhost/templateyysi/transaksi/selectBox',
                data: postForm,
                success: function(data) {
                  console.log(data);
                     $("#jabMenyerahkan").val(data);
                }
            });
        });
    
  $("#nama_penerima").change(function() {
            
            var postForm = {
                    'id': document.getElementById("nama_penerima").value,
                    'op': 2
            };
            $.ajax({
                type: "post",
                url: 'http://localhost/templateyysi/transaksi/selectBox',
                data: postForm,
                success: function(data) {
                  console.log(data);

                     $("#jabPenerima").val(data);
                }
            });
        });
  });
    
</script>

 

@endsection
