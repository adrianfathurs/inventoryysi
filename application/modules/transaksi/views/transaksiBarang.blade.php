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
      .margin{
        margin-right: 10px;

      }
      #tabeltransaksi{
        display: none;
      }
      #icon{
        margin-top: 10px;
      }
    </style>
    @endsection
    @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
      <!-- Page Heading -->


      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
         <div class="card-header">
           <h5 class=" mb-2 text-gray-800">{{$headerpencetakan}}</h5>
        </div>
          <a data-toggle="modal" data-target="#btnDelete"><i class="fas fa-arrow-circle-left fa-2x " id="icon"></i></a>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>


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
              <div class="col-md-8 margin">
                <div class="card" style="width: 15rem;"><br>      
                  <h5 class="card-title"><strong><center>Lihat</center></strong></h5>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xs-6 margin">
                    <?php if(!isset($_SESSION['btncetakkuu'])) :?>
                      <button type="button" class="btn btn-info" id="jsform">Form Sertibar</button> 
                      <?php else : ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#btnalert" >Form Sertibar</button> 
                      <?php endif;?>
                      </div>
                      <div class="col-xs-6">
                      <?php echo $this->session->userdata('btncetakkuu')?>
                      </div>
                      </div>
                    </div><!-- div row -->
                  </div>
                </div>

                
                <!-- ####################################### -->




              </div> <!-- div row -->

            </div>
          </div>
        </div>

        <!-- TABEL TRANSAKSI -->
        <div class="container-fluid" id="tabeltransaksi">
          <div class="card card-register mx-auto mt-5">
            <button type="button" class="btn btn-info" id="hidetabel">Hide</button>
            <center>
              <h4 class="card-header">Table Data Surat SERTIBAR</h4>
            </center>
            <div class="card-body">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>Action</th>
                  <th>No</th>
                  <th>Nama Penyerah</th>  
                  <th>Jabatan Penyerah</th>  
                  <th>Nama Penerima</th>  
                  <th>Jababan Penerima</th>  
                  <th>Lokasi Pindah</th>  
                  <th>Tanggal Penyerahan Barang</th>
                  <th>Keterangan Barang</th>  
                </thead>
                <tbody>
                  <?php $j=0;foreach($ttransaksi as $tr): var_dump($tr['nama_penyerah']);var_dump($tr['Id_transaksi']);?>

                  <tr>
                    <td>
                      <button type="button" class="btn btn-primary" id="btnedit" data-toggle="modal" data-target="#Edit"
                      data-idtrans="<?= $tr['Id_transaksi']?>"
                      data-nama_penyerah="<?= $tr['nama_penyerah']?>"
                      data-jabatan_penyerah="<?= $tr['jabatan_penyerah']?>"
                      data-nama_penerima="<?= $tr['nama_penerima']?>"
                      data-jabatan_penerima="<?= $tr['jabatan_penerima']?>"
                      data-lokasi_peletakan="<?= $tr['lokasi_peletakan']?>"
                      data-tgl_peletakan="<?= $tr['tgl_peletakan']?>"
                      data-ket="<?=$tr['ket']?>"
                      >
                      EDIT
                    </button>
                  </td>
                  <td>{{$j++;}}</td>
                  <td>{{$tr['nama_penyerah']}}</td>
                  <td>{{$tr['jabatan_penyerah']}}</td>
                  <td>{{$tr['nama_penerima']}}</td>
                  <td>{{$tr['jabatan_penerima']}}</td>
                  <td>{{$tr['lokasi_peletakan']}}</td>
                  <td>{{$tr['tgl_peletakan']}}</td>
                  <td>{{$tr['ket']}}</td>

                </tr>
              <?php endforeach;?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <!--/////////////////////////////////////////////////////////////////////////////  -->
    <div class="container-fluid" id="containers">
      <div class="card card-register mx-auto mt-5">
        <button type="button" class="btn btn-info" id="hide">Hide</button>
        <center>
          <h5 class="card-header">Form Berita Acara Serah Terima</h5>
        </center>
        <div class="card-body">
          <form id="form" method="POST" action="{{base_url('transaksi/setTambah/')}}">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="ygMenyerahkan">Nama Penyerah</label><br>
                    <!-- <input type="text" id="ygMenyerahkan" class="form-control" placeholder="Nama yang Menyerahkan" required="required " name="penyerah"> -->
                    <select class=" select2 js-example-responsive form-control " style="width: 100%" name="idpenyerah" id="nama_penyerah" required="true">
                      <option value="">-----------------------------------------------------------------Pilih Nama------------------------------------------------------------------------</option>
                      <?php foreach ($karyawan as $key): ?>
                        <?php if($key['nama']==$nama):?>
                          <option value="{{$key['id_karyawan']}}">{{$key['nama'].'/'}}</option>
                        <?php endif;?> 
                        <?php if($key['nama']!=$nama):?>
                          <option value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
                        <?php endif;?> 

                        <?php 
                      endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label for="jabMenyerahkan">Jabatan Penyerah</label><br>

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

                  <select class="form-control js-example-responsive select2" id="nama_penerima" style="width: 100%" name="idpenerima" required="true">
                    <option value="">-----------------------------------------------------------------Pilih Nama--------------------------------------</option>
                    <?php foreach ($karyawan as $key): ?>
                      <option class="form control" value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
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
          <div class="col-4-md margin">
            <div class="form-group">
              <div class="form-label-group">
                <label for="lokasiBarang">Lokasi Pindah/Lokasi Mutasi </label>
                <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Peletakan " required="required" name="lokasibarang" >
              </div>
            </div>
          </div>
          <div class="col-4-md">
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
      <button type="submit" name="btnforminput" class="btn btn-success" id="submit">Submit</button>

    </form>
  </div>
</div>
</div>

<!-- Modal btn Delete -->
<div class="modal fade" id="btnDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitleLabelInfo"><strong>INFO PENTING</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Apabila Anda Meninggalkan Halaman Ini Maka Data Yang Telah Anda Inputkan Baru Saja Akan Otomatis Terhapus</b></p>
        <p>Apakah Anda Tetap Ingin Meninggalkan Halaman ini?</p>
      </div>
      <div class="modal-footer">
        <a href="{{base_url('transaksi/clearId')}}"><button type="button" class=" btn btn-Danger" >
          <span aria-hidden="true">Tinggalkan Halaman</span></button></a>
        <button type="button" class=" btn btn-success" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Tetap di Halaman ini</span>
        </button>
        </button>                         
      </div>
    </div>
  </div>
</div>
<!-- ################### -->
<!-- Modal btnAlert -->

<div class="modal fade" id="btnalert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitleLabelInfo">Info Tahap Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda Telah Melakukan Input Form Sertibar, Lakukan Verifikasi Dengan Menekan Tombol<img src="{{base_url('assets/dist/img/Verifikasi.jpg')}}" height="50px" width="100px"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">OKE,PAHAM</span>
        </button>                         
      </div>
    </div>
  </div>
</div>
<!--####################  -->
<!-- Modal Edit-->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Edit">EDIT DATA SERTIBAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ########################### -->
        <form id="form" method="POST" action="{{base_url('transaksi/updatetransaksi/')}}">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <div class="form-label-group">
                  <label for="penyerah">Nama yang Menyerahkan</label><br>
                  <!-- <input type="text" id="ygMenyerahkan" class="form-control" placeholder="Nama yang Menyerahkan" required="required " name="penyerah"> -->
                  <select class=" select2 js-example-responsive form-control " style="width: 100%" name="idPenyerah" id="penyerah" required="true">
                    <option value="">---Pilih Nama----</option>
                    <?php foreach ($karyawan as $key): ?>

                      <option value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
                      <?php 
                    endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="jabPenyerah">Jabatan yang Menyerahkan</label><br>

                  <input type="text" class=" form-control " readonly="true" name="jabPenyerah" id="jabPenyerah">    
                </input>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <div class="form-label-group">
                <label for="penerima">Nama Penerima</label><br>

                <!-- <input type="text" id="ygMenerima" class="form-control" placeholder="Nama Penerima" required="required" name="penerima"> -->

                <select class="form-control js-example-responsive select2" id="penerima" style="width: 100%" name="idPenerima" required="true">
                  <option value="">----Pilih Nama---</option>
                  <?php foreach ($karyawan as $key): ?>
                    <option class="form control"value="{{$key['id_karyawan']}}">{{$key['nama']}}</option>
                  <?php endforeach?>
                </select>
              </div> 

            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="jabPenerimaan">Jabatan Penerima</label>
                <input type="text" class=" form-control " readonly="true" name="jabPenerima" id="jabPenerimaan">    
              </input>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-5-md margin">
          <div class="form-group">
            <div class="form-label-group">
              <label for="lokasiBarang">Lokasi Pindah/Lokasi Mutasi </label>
              <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Peletakan " required="required" name="lokasiBarang" >
            </div>
          </div>
        </div>
        <div class="col-5-md">
          <div class="form-group">
            <div class="form-label-group">
              <label for="tglPenyerahan">Tanggal Penyerahan Barang</label>
              <input type="date" id="tglPenyerahan" class="form-control" placeholder="Tanggal Penyerahan Barang" required="required" name="tglPenyerah">
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

    <div class="modal-footer">

      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <input type="hidden" name="idTransaksi" id="id_transaksi"/>
      <button type="submit" name="btnsubmit" class="btn btn-primary">Edit & Save</button>
    </div>
  </form>  
</div>
</div>
</div> 

<!-- ####################################### -->





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
        <table  class="table table-bordered  ">
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
  </div>



  <!-- End of Main Content -->
  @endsection

  @section('scripts-js')
  <script src="{{base_url('assets/plugins/jquery/jquery.PrintArea.js')}}"></script>

  <script src="{{base_url('assets/plugins/select/js/select2.min.js')}}"></script>
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
      $("#btntabeltransaksi").click(function(){
        $("#tabeltransaksi").show();
        
      });
      $("#hidetabel").click(function(){
        $("#tabeltransaksi").hide();
        
      });
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
          //url: 'http://www.ysinvetaris.epizy.com/transaksi/selectBox',
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
          //url: 'http://www.ysinvetaris.epizy.com/transaksi/selectBox',
          data: postForm,
          success: function(data) {
            console.log(data);

            $("#jabPenerima").val(data);
          }
        });
      });
    });
    
  </script>

  <script type="text/javascript">
    $(document).on("click",'#btnedit',function(){

      var id=$(this).data('idtrans');
      var nama_penyerah=$(this).data('nama_penyerah');
      var jabatan_penyerah=$(this).data('jabatan_penyerah');
      var nama_penerima=$(this).data('nama_penerima');
      var jabatan_penerima=$(this).data('jabatan_penerima');
      var lokasi_peletakan=$(this).data('lokasi_peletakan');
      var tgl_peletakan=$(this).data('tgl_peletakan');
      var ket=$(this).data('ket');
      
      
      $(".modal-footer #id_transaksi").val(id);
      $(".modal-body #penyerah").val(nama_penyerah);
      $(".modal-body #jabPenyerah").val(jabatan_penyerah);
      $(".modal-body #penerima").val(nama_penerima);
      $(".modal-body #jabPenerimaan").val(jabatan_penerima);
      $(".modal-body #lokasiBarang").val(lokasi_peletakan);
      $(".modal-body #tglPenyerahan").val(tgl_peletakan);

    });
  </script>

  <!-- Cript modal edit -->
  <script>
    $(document).ready(function() {
      $("#penyerah").change(function() {

        var postForm = {
          'id': document.getElementById("penyerah").value,
          'op': 1
        };
        $.ajax({
          type: "post",
          url: 'http://localhost/templateyysi/transaksi/selectBox',
          //url: 'http://www.ysinvetaris.epizy.com/transaksi/selectBox',
          data: postForm,
          success: function(data) {
            console.log(data);
            $("#jabPenyerah").val(data);
          }
        });
      });

      $("#penerima").change(function() {

        var postForm = {
          'id': document.getElementById("penerima").value,
          'op': 2
        };
        $.ajax({
          type: "post",
          url: 'http://localhost/templateyysi/transaksi/selectBox',
          //url: 'http://www.ysinvetaris.epizy.com/transaksi/selectBox',
          data: postForm,
          success: function(data) {
            console.log(data);

            $("#jabPenerimaan").val(data);
          }
        });
      });
    });
    
  </script>


  @endsection
