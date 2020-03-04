    @layout('template/main/barang/main')
    @section('scripts-css')
    <style type="text/css">
      #icon{
        margin-left: 10px;
      }
      .border {

        height: 39px;
      }

    </style>
    @endsection
    @section('content')
    
    <!-- Begin Page Content -->
    
    

    <div class="container-fluid">
      <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
      <div class="card shadow mb-4">
        <div class="card-header">
          <h5>Form Tambah Barang</h5>
        </div>

        <div class="card-body">
          <?php echo form_open_multipart('barang/tambahbarang/');?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="namaBarang">Nama Barang</label>
                  <input type="text" id="namaBarang" class="form-control" placeholder="Nama Barang" name="namaBarang" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="merkBarang">Merk/Type Barang</label>
                  <input type="text" id="merkBarang" class="form-control" placeholder="Merk/Type Barang" name="merkBarang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="noSertif">No. Seritifikat/No. Pabrik</label>
              <input type="text" id="noSertif" class="form-control" placeholder="No. Seritifikat/No. Pabrik" name="noSertif" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="warnaBarang">Warna Barang</label>
                  <input type="text" id="warnaBarang" class="form-control" placeholder="Warna Barang" name="warnaBarang" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="bahanBarang">Bahan Barang</label>
                  <input type="text" id="bahanBarang" class="form-control" placeholder="Bahan Barang" name="bahanBarang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="satuanBarang">Satuan Barang</label>
                  <input type="text" id="satuanBarang" class="form-control" placeholder="Satuan Barang" name="satuanBarang" required="required"> 
                </div>
              </div>
              <div class="col-md-6">


                <div class="form-label-group">
                  <label>Harga Barang</label>
                </div>
                <div class="input-group">
                  <div class="input-group-append ">
                    <div class="input-group-text border">
                      <label class="label">Rp</label>
                    </div>
                  </div>
                  <input type="text" id="hargaBarang" class="form-control hargaBarang"  placeholder="Harga Barang" name="hargaBarang" required="required">
                </div>
                

              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="caraBarang">Cara Peroleh Barang</label>
                  <input type="text" id="caraBarang" class="form-control" placeholder="Cara Peroleh Barang" name="caraBarang" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="tglBarang">Tanggal Peroleh Barang</label>
                  <input type="date" id="tglBarang" class="form-control" placeholder="Tanggal Peroleh Barang" name="tglBarang">  
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="keadaanBarang">Keadaan Barang</label>
                  <select class="form-control" id="keadaanBarang" name ="keadaanBarang" required="required">
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="lokasiBarang">Lokasi Barang</label>
                  <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Barang" name="lokasiBarang">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <label for="keterangan">Keterangan Barang</label>
                <textarea class="form-control" id="ketBarang" rows="3" placeholder="Keterangan" required="required" name="ket"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="imgbarang">Gambar Barang</label>
              <input type="file" name="foto" class="form-control" required="true" >
            </div>
          </div>

          <button type="submit" class="btn btn-success btn-block" >Tambah</button>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
    @endsection
    @section('scripts-js')
    <script type="text/javascript" src="{{base_url('assets/dist/js/jquery.mask.min.js')}}"></script>
  
    <script type="text/javascript">
      $(document).ready(function(){

                // Format mata uang.
                var input=$("#hargaBarang").val();
                $("#hargaBarang").val(input);
                console.log(input);
                $( '.hargaBarang' ).mask('000.000.000,00', {reverse: true});
             

            });
    </script>
    @endsection
