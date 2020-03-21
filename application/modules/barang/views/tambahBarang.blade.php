    @layout('template/main/barang/main')
    @section('scripts-css')
    <link rel="stylesheet" href="{{base_url('assets/plugins/select2/css/select2.min.css')}}">
    <style type="text/css">
      #icon{
        margin-left: 10px;
      }
      .border {

        height: 39px;
      }
      .image-preview{
        border: 2px solid #dddddd;
        min-height: 280px; 
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #cccccc;
        width: 450px;
      }
      .image-preview__image{
        display: none;
        width: 100%;
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
                  <label for="pemilikBarang">Pemilik Barang</label>
                  <select class=" select2 js-example-responsive form-control " id="pemilikBarang" name ="pemilikBarang" required="required" style="width: 100%">
                    <option value="">--------------------------------------------------------------Pilih Pemilik Barang----------------------------------------------------------------------------</option>
                    <?php
                    foreach($pemilik as $p):
                      ?>
                      <option class="form control" value="{{$p['instansi']}}">{{$p['instansi']}}</option>
                    <?php endforeach?>
                  </select>
                </div>
                
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="keadaanBarang">Keadaan Barang</label>
                  <select class=" select2 js-example-responsive form-control " id="keadaanBarang" name ="keadaanBarang" required="required" style="width: 100%">
                    <option value="Baik">Baik</option>
                    <option value="Hilang">Hilang</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Dijual">Dijual</option>
                  </select>
                </div>
              </div>
              
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 mb-2">
                <div class="form-label-group">
                  <label for="lokasiBarang">Lokasi Barang</label>
                  <select class=" select2 js-example-responsive form-control " id="LokasiBarang" name ="lokasiBarang" required="required" style="width: 100%">
                    <option value="">--------------------------------------------------------------Pilih Lokasi Barang----------------------------------------------------------------------------</option>
                    <?php foreach ($lokasi as $l):?>
                       <option class="form control" value="{{$l['id_lokasi']}}">{{$l['nama_lokasi']}}</option>
                    <?php endforeach?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="lokasiBarang">Lokasi/Ruangan Detail</label>
                  <select class=" select2 js-example-responsive form-control "id="LokasiDetail" name ="lokasiDetail" required="required" style="width: 100%">
                    <option value="">--------------------------------------------------------------Pilih Detail Ruangan----------------------------------------------------------------------------</option>
                  </select>

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

          <!-- -------- -->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-7">
                <div class="form-label-group">
                  <label for="imgbarang">Upload Gambar Barang</label>
                  <input type="file" name="foto" class="form-control" id="fotoBar" required="true" >
                </div>
              </div>
              <div class="col-md-5">
                <div class="image-preview" name="imagePreview" id="imagePreview">
                  <img src="" alt="Image Preview " class="image-preview__image" width="80px" height="250px">
                  <span class="image-preview_default-text">Image Preview</span>
                </div>
              </div>
            </div>
          </div>
          <!-- -------- -->


          <button type="submit" class="btn btn-success btn-block" >Tambah</button>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
    @endsection

    @section('scripts-js')
    <script type="text/javascript" src="{{base_url('assets/dist/js/jquery.mask.min.js')}}"></script>
    <script  src="{{base_url('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
        $('.select2').select2();
      });
    </script>
    
    <script type="text/javascript">
      $(document).ready(function(){

                // Format mata uang.
                var input=$("#hargaBarang").val();
                $("#hargaBarang").val(input);
                
                $( '.hargaBarang' ).mask('000.000.000,00', {reverse: true});


              });
    </script>
            
    <script>
      $(document).ready(function(){
        const fotoBarang=document.getElementById("fotoBar");
        const previewContainer=document.getElementById("imagePreview");
        const previewImage=previewContainer.querySelector(".image-preview__image");
        const previewDefaultText=previewContainer.querySelector(".image-preview_default-text");
        fotoBarang.addEventListener("change",function(){
          const file=this.files[0];
          if(file){
            const reader = new FileReader();
            previewDefaultText.style.display="none";
            previewImage.style.display="block";
            reader.addEventListener("load",function(){
              console.log(this);
              previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
          }
        });
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $("#LokasiBarang").change(function() {
        var postForm = {
          'id': document.getElementById("LokasiBarang").value,
          'op': 1
        };
        $.ajax({
          type: "post",
          url: 'http://localhost/templateyysi/barang/selectBox_lokasi',
          //url: 'http://www.ysinvetaris.epizy.com/transaksi/selectBox',
          data: postForm,
          success: function(data) {
            console.log(data);
            $("#LokasiDetail").html(data);
          }
        });
      });
    });

    </script>



            @endsection
