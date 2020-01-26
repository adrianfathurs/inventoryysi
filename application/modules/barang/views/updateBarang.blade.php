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
   </style>
 @endsection

 @section('scripts-js')
  <script src="{{base_url('assets/plugins/jquery/jquery.PrintArea.js')}}"></script>
   <script >
    $(document).ready(function(){
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

    });
  </script>
@endsection
 
  
  @section('content')

    <?php foreach ($daftar as $g):
    $id=$g['id_barcode'];
    $idbarang=$g['id_barang'];
    $iddepartement=$g['id_departement'];
    $idyayasan=$g['id_yayasan'];
    $date=strtotime($g['tanggal_pengadaan']);
        $date_month=date('n',$date);
        $date_year=date('y',$date);
    ?> 
                      <!-- link trigger modal -->
                        <a   id="button" data-toggle="modal" data-target="#exampleModalCenter">
                          <i id="icon" class="fas fa-arrow-circle-left fa-2x"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Apabila Menekan Tombol Kembali, data anda belum tersimpan
                              </div>
                              <div class="modal-footer">
                                <?php foreach ($kembali as $k) {
                                  $idbar=array();
                                  $idbar=$k['id_barcode'];
                                }?>
                                  <button type="button" class="btn btn-light">Cancel</button>
                                  <a href="{{base_url('transaksi/selectidbarcode/').$iddepartement.'/'.$idyayasan.'/'.$date_month.'/'.$date_year.'/'.$idbar}}"><button type="button" class="btn btn-danger">Kembali</button></a> 
                              </div>
                            </div>
                          </div>
                        </div>
   
    

      <!-- Dokumentasi tentang pengambilan id terakhir setelah input dilakukan -->
  <!-- <div class="container-fluid">
    <div class="card card-register mx-auto mt-5">
      <center>
       <div class="card-header">Barcode</div>
        </center>
    <div class="card-body">
        <?php //foreach ($get as $g):?>
          <label for="namaBarang">Nama Barang</label>     
            <label for="idBarang">{{$g['nama_barang']}}</label>      
        <?php  //endforeach;?>                  
    </div>    
     </div>
  </div> -->

<!-- $tahun//=YEAR($g['tanggal_pengadaan']);
    $tahunb//=$tahun-2000; -->

  <!--  Begin Page Content --> 
  

<div class="container-fluid">
        <div class="card card-register mx-auto mt-5">
          <center>
          <div class="card-header">PEMBAHARUAN BARANG</div>
          </center>   
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <form action="{{base_url('barang/updatebarang/').$id.'/'.$idbarang.'/'.$iddepartement.'/'.$idyayasan.'/'.$date_month.'/'.$date_year}}" method="POST">
                   <div class="form-group">
                <!-- als -->
                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Nama Barang</p></div>
                          <div>
                            <input type="text" id="namabarang" class="form-control" placeholder="namabarang" name="namaBarang"  readonly value="{{$g['nama_barang']}}">
                               <!-- <p>{{$g['id_barang']}}</p> -->
                          </div>
                        </div>
                      
                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Merk/Type Barang</p></div>
                          <div>
                            <input type="text" id="merkbarang" class="form-control" placeholder="merkbarang" name="merkBarang" readonly value="{{$g['merk']}}">
                              <!-- <p>{{$g['merk']}}</p -->
                           </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">No. Seritifikat/No. noPabrik</p></div>
                          <div>
                            <input type="text" id="nopabrik" class="form-control" placeholder="nopabrik" name="noPabrik"  readonly value="{{$g['no_pabrik']}}">
                            <!-- <p>{{$g['no_pabrik']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Warna Barang</p></div>
                          <div>
                           <input type="text" id="warnabarang" class="form-control" placeholder="warnabarang" name="warnaBarang"  readonly value="{{$g['warna_barang']}}">
                        <!-- <p>{{$g['warna_barang']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Bahan Barang</p></div>
                          <div>
                             <input type="text" id="bahanbarang" class="form-control" placeholder="bahanbarang" name="bahanBarang"  readonly value="{{$g['bahan']}}">
                          <!-- <p>{{$g['bahan']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Satuan Barang</p></div>
                          <div>
                             <input type="text" id="satuanbarang" class="form-control" placeholder="satuanBarang" name="satuanBarang"  readonly value="{{$g['satuan']}}">
                          <!-- <p>{{$g['satuan']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Harga Barang</p></div>
                          <div>
                             <input type="text" id="hargabarang" class="form-control" placeholder="hargaBarang" name="hargaBarang"  readonly value="{{$g['harga_satuan']}}">
                          <!-- <p>{{$g['harga_satuan']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Cara Peroleh</p></div>
                          <div>
                             <input type="text" id="caraperoleh" class="form-control" placeholder="caraperoleh" name="caraPeroleh" readonly value="{{$g['cara_peroleh']}}">
                          <!-- <p>{{$g['cara_peroleh']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Tanggal Peroleh</p></div>
                          <div>
                             <input type="text" id="tanggalperoleh" class="form-control" placeholder="tanggalperoleh" name="tanggalPeroleh"  value="{{$g['tanggal_pengadaan']}}" readonly=>
                          <!-- <p>{{$g['tanggal_pengadaan']}}</p> -->
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Keadaan Barang</p></div>
                          <div>
                            <div>
                              <select class="form-control" id="keadaanbarang" name="keadaanbarang" required="required">
                                
                                  <option value="BAIK">BAIK</option>
                                  <option value="RUSAK">RUSAK</option>
                                
                              </select>
                           </div>
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Tanggal Rusak</p></div>
                          <div class="form-label-group">
                            <input type="date" id="tanggalrusak" class="form-control" name="tanggalrusak" >    
                          </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-4"><p class="font-weight-bold">Lokasi Awal</p></div>
                          <div>
                             <input type="text" id="lokasi" class="form-control" placeholder="lokasi" name="lokasiperoleh" readonly value="{{$g['lokasi']}}">
                          <!-- <p>{{$g['lokasi']}}</p> -->
                          </div>
                      </div><br>

                      <button type="submit" name="perbarui" id="perbarui" class="btn btn-success btn-block" >PERBARUI DATA BARANG</button>
            </form>
          </div>
      </div>
      <div class="col-6">
                <div class="col-3">
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
              
                <div class="col-3">
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
                              <img src="{{base_url('temp/barcode/').$kode.'.jpg'}}" width="120px" height="50px" alt="Barcode"></img></br>
                            </div>
                          </div>

                          <div class="col-5">
                            <button type="button" class="btn btn-success" id="btndownloadbarcode"><i class="fas fa-fw fa-download fa-1x"></i></button> 
                            <button type="button" class="btn btn-info btnback"><i class="fas fa-arrow-circle-left fa-1x"></i></button> 
                          </div>
                      </div>
                </div>
                </div><!-- col-3 </div> -->
      </div><!-- col-6 </div> -->
   </div>
  </div>
</div>
<?php endforeach;?>      
    <!-- End of Main Content -->
@endsection