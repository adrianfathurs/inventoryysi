    @layout('template/main/barang/main')
    
    @section('scripts-css')
    <style type="text/css">
      #qrcode
      {
        display: none;
      }
      #barcode
      {
        display: none;
      }
      #txtareaketBarang
      {
        display:none;
      }
      #icon
      {
        color:blue;
        margin:10px;
      }
      .margin
      {
        margin:10px;
      }
    </style>
    @endsection

    @section('content')
    <div class="container-fluid">
      <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
      <div class="card shadow mb-4">

       <div class="card-header">
         <h5 class=" mb-2 text-gray-800">{{$subtitle}}</h5>
       </div>
       <!-- link trigger modal back-->
       <a   id="button" data-toggle="modal" data-target="#exampleModalCenter">
        <i id="icon" class="fas fa-arrow-circle-left fa-2x"></i>
      </a>


      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="card" style="width: 20rem;">        
              <div class="card-body">
                <h5 class="card-title"><strong>Lihat</strong></h5><br>
                <!-- button buat cetak barcode -->
                <button type="button" class="btn btn-info" id="btnbarcode">Barcode</button>
                <!-- button buat cetak qrcode -->
                <button type="button" class="btn btn-info" id="btnqrcode">QRcode</button>    
              </div>
            </div>
          </div>

          <div class="col-6">
            <!-- fungsinya digunakan untuk cetakQrcode  -->
            <div class="card" id="qrcode" style="width: 23rem;">        
              <div class="card-body-mx-auto">
                <h5 class="card-title"><strong>QRcode</strong></h5><br>
                <div class="row">
                  <div class="col-2"></div> 
                  <div class="col-4">
                    <div class="printqrcode">
                      <img class="margin" src="{{base_url('assets/dist/img/qrcode/').$kode.'.png'}}" width="250px" height="250px"  alt="Qrcode"></img></br>
                    </div>
                  </div>
                  <?php $index1=1;$index2=0;?>
                  

                </div>
              </div>
              <a href="{{base_url('barang/qrcode/').$index1}}"><button type="button" class="btn btn-success" ><i class="fas fa-fw fa-download fa-1x"></i></button></a> 
              <a href="{{base_url('barang/qrcode/').$index2}}"><button type="button" class="btn btn-success" ><i class="fas fa-fw fa-print fa-1x"></i></i></button></a> 
              <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-1x"></i></button> 

            </div>

            <!-- fungsinya untuk cetak Barcode -->
            <div class="card" id="barcode" style="width: 27rem;">        
              <div class="card-body-mx-auto">
                <h5 class="card-title"><strong>Barcode</strong></h5><br>
                <!-- div row -->
                <div class="row">
                  <div class="col-2"></div>  
                  <div class="col-5">
                    <div class="printbarcode">
                      <span>{{$kode}}</span><br>
                      <img class="margin" src="{{base_url('assets/dist/img/barcode/').$kode.'.jpg'}}" width="250px" height="250px" alt="Barcode"></img></br>
                    </div>
                  </div>
                  <?php $index1=1;$index2=0;?>
                  </div>
                    <a href="{{base_url('barang/barcode/').$index1}}"><button type="button" class="btn btn-success" ><i class="fas fa-fw fa-download fa-1x"></i></button></a> 
                    <a href="{{base_url('barang/barcode/').$index2}}"><button type="button" class="btn btn-success" ><i class="fas fa-fw fa-print fa-1x"></i></i></button></a> 
                    <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                 
              </div>
            </div><!-- col-3 </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal back-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalCenterTitle">Warning</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">Apakah ingin kembali,ke daftar Barang? </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-light">Cancel</button>
      <a href="{{base_url('barang/daftarbarangview/')}}"><button type="button" class="btn btn-success">Kembali</button></a> 
    </div>
  </div>
</div>
</div>

@endsection
@section('scripts-js')
<script src="{{base_url('assets/plugins/jquery/jquery.PrintArea.js')}}"></script>
<script >
  $(document).ready(function(){
   $("#btndeleteeditketbar").click(function(){
    $('#txtareaketBarang').hide();
    alert("Perubahan Ralat Keterangan Barang Dihapus !");
  });
   $("#btneditketbar").click(function(){
    $('#txtareaketBarang').show();
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


      $("#perbarui").click(function(){
        alert("Terimakasih,Data Barang Telah Diperbaharui");
      });
      
      $("#jsform").click(function(){
        $("#containers").show();
      });
    });
  </script>
  @endsection