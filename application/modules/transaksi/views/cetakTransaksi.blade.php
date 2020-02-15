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
      .margintop{
        margin-top: 10px;
      }
      .marginleft{
        margin-left: 25%;
      }
      .marginleftsert{
        margin-left: 10%;
      }
      
    </style>
    @endsection
    @section('content')
    <!-- Begin Page Content -->
    

<!-- TABEL TRANSAKSI -->
<div class="container-fluid" id="tabeltransaksi">
  <div class="card card-register mx-auto mt-5">
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
                <div class="row margintop marginleft">

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
                </div>
                <div class="row margintop marginleftsert">
                  <a href="">
                    <button type="button" class="btn btn-success" id="cetaksertibar">Cetak Sertibar</button>
                  </a>
                </div>
                <div class="row margintop">
                  <a href="">
                      <button type="button" class="btn btn-success" id="cetakqrdanbarcode">Cetak Barcode & QRcode</button>
                    </a>
                </div>
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