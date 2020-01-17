  @layout('template/main/barang/main')

  @section('content')
   
    <a href="{{base_url('barang/deleteproses/').$id}}"><i id="icon" class="fas fa-arrow-circle-left fa-2x"></i></a>

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
  <?php foreach ($get as $g):
    $date=strtotime($g['tanggal_pengadaan']);
    $date_month=date('n',$date);
    $date_year=date('y',$date);
    
    ?> 

    <div class="container">
        <div class="card card-register mx-auto mt-5">
          <center>
          <div class="card-header">Verifikasi Input Barang</div>
          </center>
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
