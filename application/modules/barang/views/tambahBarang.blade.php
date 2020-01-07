    @layout('template/main/barang/main')
    @section('content')
   
   <!-- Begin Page Content -->
   <div class="container-fluid">
    <div class="card card-register mx-auto mt-5">
      <center>
      <div class="card-header">Form Input Barang</div>
      </center>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="namaBarang">Nama Barang</label>
                  <input type="text" id="namaBarang" class="form-control" placeholder="Nama Barang" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="merkBarang">Merk/Type Barang</label>
                  <input type="text" id="merkBarang" class="form-control" placeholder="Merk/Type Barang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="noSertif">No. Seritifikat/No. Pabrik</label>
              <input type="text" id="noSertif" class="form-control" placeholder="No. Seritifikat/No. Pabrik" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="warnaBarang">Warna Barang</label>
                  <input type="text" id="warnaBarang" class="form-control" placeholder="Warna Barang" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="bahanBarang">Bahan Barang</label>
                  <input type="text" id="bahanBarang" class="form-control" placeholder="Bahan Barang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="satuanBarang">Satuan Barang</label>
                  <input type="text" id="satuanBarang" class="form-control" placeholder="Satuan Barang" required="required"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="hargaBarang">Harga Barang</label>
                  <input type="text" id="hargaBarang" class="form-control" placeholder="Harga Barang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="caraBarang">Cara Peroleh Barang</label>
                  <input type="text" id="caraBarang" class="form-control" placeholder="Cara Peroleh Barang" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="tglBarang">Tanggal Peroleh Barang</label>
                  <input type="date" id="tglBarang" class="form-control" placeholder="Tanggal Peroleh Barang">  
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="keadaanBarang">Keadaan Barang</label>
                  <select class="form-control" id="keadaanBarang" required="required">
		    		<option>Keadaan Barang</option>
			    	<option value="Baik">Baik</option>
			    	<option value="Rusak">Rusak</option>
		    	</select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="lokasiBarang">Lokasi Barang</label>
                  <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Barang">
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-success btn-block" href="login.html">Tambah</a>
        </form>
      </div>
    </div>
  </div>
@endsection
