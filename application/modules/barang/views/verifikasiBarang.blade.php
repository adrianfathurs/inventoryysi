  
  @layout('template/main/barang/main')
 @section('scripts-css')

  <link rel="stylesheet" href="{{base_url('assets/plugins/select2/css/select2.min.css')}}">
  <style type="text/css">
    
      .margintop{
        margin-top: 10px;
      }
      .marginleft{
        margin-left: 25px;
      }
      
      
    </style>
    @endsection
  @section('content')

                     
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ada Kesalahan?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Ulangi Proses Penginputannya !
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-light">Cancel</button>
                                  <a href="{{base_url('barang/deleteproses/').$id}}"><button type="button" class="btn btn-danger">Ya</button></a> 
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
  <?php foreach ($daftar as $g):
    $date=strtotime($g['tanggal_pengadaan']);
    $date_month=date('n',$date);
     $date_year=date('y',$date);
    var_dump($g['harga_satuan']);
    ?> 

    <div class="container-fluid">
      <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
        <div class="card shadow mb-4">
         <div class="card-header"><h5>Verifikasi Input Barang</h5></div>
          <!-- link trigger modal -->
          <div class="container-fluid">
          <div class="row ">
            <div class="col-3-md"></div>
                      <div class="col-3-md">
                        <button   id="button" class="btn btn-warning margin-top margin-left" data-toggle="modal" data-target="#exampleModalCenter">
                         Ada Kesalahan?
                        </button>
                        </div>
          </div>
          </div>
          <div class="card-body">
            <form action="{{base_url('barang/tambahbarcode/').$id.'/'.$yas.'/'.$date_month.'/'.$date_year}}" method="POST">
              <div class="form-group">
                <!-- als -->
                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Nama Barang</p>
                  </div>
                  <div>
                  <p>{{$g['nama_barang']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Merk/Type Barang</p>
                  </div>
                  <div>
                  <p>{{$g['merk']}}</p>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">No. Seritifikat/No. Pabrik</p>
                  </div>
                  <div>
                  <p>{{$g['no_pabrik']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Warna Barang</p>
                  </div>
                  <div>
                  <p>{{$g['warna_barang']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Bahan Barang</p>
                  </div>
                  <div>
                  <p>{{$g['bahan']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Satuan Barang</p>
                  </div>
                  <div>
                  <p>{{$g['satuan']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Harga Barang</p>
                  </div>
                  <div>
                  <p>{{$g['harga_satuan']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Cara Peroleh</p>
                  </div>
                  <div>
                  <p>{{$g['cara_peroleh']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Tanggal Peroleh</p>
                  </div>
                  <div>
                  <p>{{$g['tanggal_pengadaan']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Keadaan Barang</p>
                  </div>
                  <div>
                  <p>{{$g['keadaan_barang']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Lokasi Peroleh</p>
                  </div>
                  <div>
                  <p>{{$g['lokasi']}}</p>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4">
                    <p class="font-weight-bold">Departemen</p>
                  </div>
                   <div>
                    <select class="form-control" id="Departement" name="departement" required="required">
                      <?php foreach($dept as $de):?>
                        <option value="{{$de['id_departement']}}">{{$de['nama_departement']}}</option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
              </div>
              
              <button class="btn btn-success btn-block" >PROSES</button>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach;?>      
    <!-- End of Main Content -->
@endsection
