    @layout('template/main/barang/main')
    @section('content')
    
   <!-- Begin Page Content -->
    
    <style type="text/css">
      #icon{
        margin-left: 10px;
      }
    </style>
 
   <div class="container-fluid">
    <div class="card card-register mx-auto mt-5">
      <center> 
      <div class="card-header">
         <center><h2><strong>Form Tambah Barang</strong></h2></center>
      </div>
      </center>
      <div class="card-body">
        <form method="POST" action="{{base_url('barang/tambahbarang')}}">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
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
              <div class="col-md-6">
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
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="satuanBarang">Satuan Barang</label>
                  <input type="text" id="satuanBarang" class="form-control" placeholder="Satuan Barang" name="satuanBarang" required="required"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="hargaBarang">Harga Barang</label>
                  <input type="text" id="hargaBarang" class="form-control" placeholder="Harga Barang" name="hargaBarang" required="required">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
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
              <div class="col-md-6">
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
          <button class="btn btn-success btn-block">Tambah</button>
        </form>
      </div>
    </div>
  </div>
@endsection
