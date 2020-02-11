    @layout('template/main/barang/main')
    @section('scripts-css')
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
      }
    </style>
    @endsection

    @section('content')
    <div class="container-fluid">
     <div class="card shadow mb-4">
      <div class="card-header py-3">
       <div class="card-header">
        <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>
        <!-- link trigger modal back-->
        <a   id="button" data-toggle="modal" data-target="#exampleModalCenter">
          <i id="icon" class="fas fa-arrow-circle-left fa-2x"></i>
        </a>
      </div>
    </div>

    <div class="card-body">
      <div class="col-xs-3">
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
  
        <div class="col-xs-3">
          <!-- fungsinya digunakan untuk cetakQrcode  -->
          <div class="card" id="qrcode" style="width: 16rem;">        
            <div class="card-body-mx-auto">
              <h5 class="card-title"><strong>QRcode</strong></h5><br>
              <div class="row">
                <div class="col-2"></div> 
                <div class="col-4">
                  <div class="printqrcode">
                    <img src="{{base_url('temp/').$kode.'.png'}}" width="55px" height="55px"  alt="Qrcode"></img></br>
                  </div>
                </div>
                <div class="col-6">
                  <button type="button" class="btn btn-success" id="btndownloadqrcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                  <button type="button" class="btn btn-info btnback" ><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                </div>
              </div>
            </div>
          </div>

          <!-- fungsinya untuk cetak Barcode -->
          <div class="card" id="barcode" style="width: 20rem;">        
            <div class="card-body-mx-auto">
              <h5 class="card-title"><strong>Barcode</strong></h5><br>
              <!-- div row -->
              <div class="row">
                <div class="col-2"></div>  
                <div class="col-5">
                  <div class="printbarcode">
                    <span>{{$kode}}</span><br>
                    <img src="{{base_url('temp/barcode/').$kode.'.jpg'}}" width="120px" height="50px" alt="Barcode"></img></br>
                  </div>
                </div>
                <div class="col-x5">
                  <button type="button" class="btn btn-success" id="btndownloadbarcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                  <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                </div>
              </div>
            </div>
          </div><!-- col-3 </div> -->
        
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


      $("#btndownloadqrcode").click(function() {
         // cetak data pada area gambar qrcode
         $('.printqrcode').printArea();
       });

      $("#btndownloadbarcode").click(function() {
        // cetak data pada area gambar barcodecode
        $('.printbarcode').printArea();
      });

      $("#perbarui").click(function(){
        alert("Terimakasih,Data Barang Telah Diperbaharui");
      });
      
      $("#jsform").click(function(){
        $("#containers").show();
      });

     /* $(".edit_data").click(function(){
        var id_barang=$(this).attr("id");

        $.ajax({
            url="{{base_url('barang/updateket/')}}",
            method="POST",
            data:{id_barang:id_barang},
            dataType="json",
            success:function(data)
            {
              $('#txtketBarang').val(data.txtketBarang);
              $('#id_barang').val(data.id);
              
              $('#btneditketeranganbarform').modal('show');

            }
        });
      });*/







    });
  </script>
  @endsection