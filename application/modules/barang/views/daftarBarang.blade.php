  @layout('template/main/barang/main')
  @section('scripts-css')
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
    #exampleModalCenterTitle
    {
      display:none;
      position: fixed;
    }
    #btncheckbox{
      margin-top: 20px;
      margin-left: 10px;
    }
    .image-preview{
      border: 2px solid #dddddd;
      min-height: 100px; 
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #cccccc;
    }
    .image-preview__image{
      display: none;
      width: 100%;
    }
    .border {
      border-radius: 2px;
        height: 38px;
      }
  }
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <h4 class=" mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h4>
  <!-- Page Heading -->
  <?= $this->session->userdata('message');?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
     <div class="card-header">
       <h5 class="mb-2">{{$subtitle}}</h5>
     </div>
     <div class="row">
       <div class="col-1-md">
         <button name="btnsubmit" id="btncheckbox" class="btn btn-success py-8 px-8"  type="submit">PILIH BARANG</button>
       </div>
       <div class="col-9-md">
         <button type="button" name="btnpetunjuk" id="btncheckbox" class="btn btn-warning py-8 px-8" data-toggle="modal" data-target="#exampleModal"><b>Petunjuk Transaksi</b></button>
       </div> 
       <div class="col-1-md "id="btninfo">
         <button type="button" name="btninfo" id="btncheckbox" class="btn btn-info py-8 px-8" data-toggle="modal" data-target="#exampleModalCenterInfo"><i class="fas fa-info"></i></button>
       </div>
     </div>
     <div class="card-body">
      <div class="table-responsive">
        <form id="form_cek" name="form_cek" method="POST" action="{{base_url('barang/selectbarcode')}}">  
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><center>Action</center></th>
                <th><center>No</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Merk</center></th>
                <th><center>No. Pabrik</center></th>
                <th><center>Bahan</center></th>
                <th><center>Cara Peroleh</center></th>
                <th><center>TGL Perolehan</center></th>
                <th><center>Warna Barang</center></th>
                <th><center>Satuan</center></th>
                <th><center>Keadaan Barang</center></th>
                <th><center>Harga/Satuan</center></th>
                <th><center>TGL Rusak</center></th>
                <th><center>Lokasi Barang</center></th>
                <th><center>Lokasi Detail</center></th>
                <th><center>Pemilik</center></th>
                <th><center>Foto</center></th>

              </tr>
            </thead>
            <tbody id="bodyTable">
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
              <?php foreach($daftar as $d):?>
                <?php 
                $id=$d['id_barcode'];
                $idbarang=$d['id_barang'];
                $iddepartement=$d['id_departement'];
                $idyayasan=$d['id_yayasan'];
                //convert format tanggal_pengadaan
                $date=strtotime($d['tanggal_pengadaan']);
                $date_month=date('m',$date);
                $date_year=date('y',$date);
                $tanggal_Pengadaan= date('d-m-Y', $date);
              //convert format tanggal_rusak
                $tanggalrusak=$d['tanggal_rusak'];
                if(isset($tanggalrusak))
                {
                  $tanggalrusak=strtotime($d['tanggal_rusak']);
                  $tanggal_Rusak=date('d-m-Y',$tanggalrusak);

                }
                else
                {
                 $tanggal_Rusak=$d['tanggal_rusak'];
               }
               ?>
               <tr>
                <td>
                  <!-- SYNTAX CHECK BOX -->
                  <input id="cek" class="cek selected" type="checkbox" name="idbarcode[]" value="{{$d['id_barcode']}}"> &nbsp;
                  <?php if($status=='admin') :?>
                    <!-- link trigger modal Edit-->
                    <a type="button" id="btnedit"  data-toggle="modal" data-target="#editmodal" 
                    data-id="<?= $id?>" 
                    data-id_barang="<?= $d['id_barang']?>" 
                    data-nama="<?= $d['nama_barang']?>"
                    data-merk="<?= $d['merk']?>"
                    data-no_pabrik="<?= $d['no_pabrik']?>"
                    data-warna_barang="<?= $d['warna_barang']?>"
                    data-bahan="<?= $d['bahan']?>"
                    data-satuan="<?= $d['satuan']?>"
                    data-harga_satuan="<?= $d['harga_satuan']?>"
                    data-cara_peroleh="<?= $d['cara_peroleh']?>"
                    data-tanggal_pengadaan="<?= $d['tanggal_pengadaan']?>"
                    data-keadaan_barang="<?= $d['keadaan_barang']?>"
                    data-lokasi="<?= $d['lokasi']?>"
                    data-tanggal_rusak="<?= $d['tanggal_rusak']?>"
                    data-ket_barang="<?= $d['ket_barang']?>"
                    data-foto="<?= $d['foto']?>"
                    >

                    <i class="fas fa-edit fa-1x"></i>
                  </a>
                  <?php
                  if(isset($_SESSION['status']))
                  {
                    if($_SESSION['status']==1){$datatarget="#exampleModalCenterLabel";}
                    else{$datatarget="#exampleModalCenterUser";}
                  }
                  else
                  {
                    $datatarget="#exampleModalCenterUser"; 
                  }
                  ?>
                  <!-- link trigger modal hapus-->
                  <a   id="button" data-toggle="modal" data-target="{{$datatarget}}">
                   <i class="fas deleting fa-trash-alt fa-1x "></i>
                 </a>      
               </td>                 
             <?php endif;?>    
             <td>{{$d['id_barcode']}}</td>
             <td><center><?=strtoupper($d['nama_barang'])?></center></td>
             <td><center><?=strtoupper($d['merk'])?></center></td>
             <td><center><?=strtoupper($d['no_pabrik'])?></center></td>
             <td><center><?=strtoupper($d['bahan'])?></center></td>
             <td><center><?=strtoupper($d['cara_peroleh'])?></center></td>
             <td><center><?=$tanggal_Pengadaan?></center></td>
             <td><center><?=strtoupper($d['warna_barang'])?></center></td>
             <td><center><?=strtoupper($d['satuan'])?></center></td>
             <td><center><?=strtoupper($d['keadaan_barang'])?></center></td>
             <td><center><?='Rp.'.number_format($d['harga_satuan'],2,",",".");?></center></td>
             <td><center><?=$tanggal_Rusak?></center></td>
             <td><center><?=strtoupper($d['lokasi'])?></center></td>
             <td><center><?=strtoupper($d['lokasi_detail'])?></center></td>
             <td><center><?=strtoupper($d['pemilik'])?></center></td>
             <td><center><img src="{{base_url('assets/dist/img/imgbarang/').$d['foto']}}" width="80" height="80"></center></td>
           </tr>
         <?php endforeach;?>
       </tbody>
     </table>
   </form>
 </div>
</div>
</div>
</div>  

<!-- ######################################################################################################### -->
<!-- Modal hapus -->
<div class="modal fade" id="exampleModalCenterLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitleLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Benarkah Anda Akan Menghapus Data Ini?
      </div>
      <div class="modal-footer">
        <a href="{{base_url('barang/daftarbarang/')}}"><button type="button" class="btn btn-light">Cancel</button></a> 
        <a href="{{base_url('barang/deleteidbarcode/').$id}}"><button type="button" class="btn btn-danger">DELETE</button></a>                           
      </div>
    </div>
  </div>
</div> 
<!-- ######################################################################################################### -->
<!-- Modal Info Tombol Action -->
<div class="modal fade" id="exampleModalCenterInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleInfo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitleLabelInfo">Info Tombol di Kolom Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>1)<span><i class="far fa-check-square fa-2x"></i></span>,&nbsp;Tombol untuk menceklist banyak barang, Apabila Anda ingin melakukan Transaksi</p>
        <p>2)<span><i class="fas fa-edit fa-2x"></i>,&nbsp;Tombol ini berfungsi untuk mengedit data barang sesuai baris yang ingin di Edit</span></p>
        <p>3)<span> <i class="fas deleting fa-trash-alt fa-1x "></i></span>,&nbsp;Tombol untuk menghapus data barang,<b>&nbsp;Hati-Hati !</b> dengan tombol ini karena data barang akan terhapus secara permanen </p>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">OKE,PAHAM</span>
        </button>                         
      </div>
    </div>
  </div>
</div> 
<!-- ######################################################################################################### -->
<!-- Modal user -->
<div class="modal fade" id="exampleModalCenterUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitleUser" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitleUser">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ANDA BUKAN ADMIN
      </div>
      <div class="modal-footer">
        <a href="{{base_url('barang/daftarbarang/')}}"><button type="button" class="btn btn-success">OK</button></a> 
      </div>
    </div>
  </div>
</div>
<!-- ######################################################################################################### -->

<!-- ######################################################################################################### -->
<!-- Modal Edit-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterEdit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterEdit">Edit Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ######################################################################## -->
        <?php echo form_open_multipart('barang/updatedata/');?>
        
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="namaBarang">Nama Barang</label>
                <input type="text" id="namaBarang" class="form-control" placeholder="Nama Barang" name="namaBarang" required="required" autofocus="autofocus" readonly="true">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="merkBarang">Merk/Type Barang</label>
                <input type="text" id="merkBarang" class="form-control" placeholder="Merk/Type Barang" name="merkBarang" required="required" readonly="true">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <label for="noSertif">No. Seritifikat/No. Pabrik</label>
            <input type="text" id="noSertif" class="form-control" placeholder="No. Seritifikat/No. Pabrik" name="noSertif" required="required" readonly="true">
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
                <input type="date" id="tglBarang" class="form-control" placeholder="Tanggal Peroleh Barang" name="tglBarang" readonly="true">  
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
                  <option value="Rusak">Hilang</option>
                  <option value="Rusak">Rusak</option>
                  <option value="Rusak">Dijual</option>
                </select>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="lokasiBarang">Lokasi Barang</label>
                <input type="text" id="lokasiBarang" class="form-control" placeholder="Lokasi Barang" name="lokasiBarang" readonly="true">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
           
                  <label for="pemilikBarang">Pemilik Barang</label>
                  <select class=" select2 js-example-responsive form-control " id="pemilikBarang" name ="pemilikBarang" required="required" style="width: 100%">
                    <option value="">-----------------------Pilih Pemilik Barang-------------------------------</option>
                    <?php
                    foreach($pemilik as $p):
                      ?>
                      <option class="form control" value="{{$p['instansi']}}">{{$p['instansi']}}</option>
                    <?php endforeach?>
                  </select>
                
          </div>
        </div>


        <div class="form-group">
         <div class="form-label-group">
          <label for="tglBarang">Tanggal Barang Rusak/Hilang/Dijual (kosongi kolom jika keadaan barang baik !)</label>
          <input type="date" id="tglBarangRusak" class="form-control" placeholder="Tanggal Barang Rusak" name="tglBarangRusak" >  
        </div>
      </div>
      <div class="form-group">
        <div class="form-group">
          <div class="form-label-group">
            <label for="keterangan">Keterangan Tambahan Barang</label>
            <textarea class="form-control" id="ketBarang" rows="3" placeholder="Keterangan" required="required" name="ketBarang"></textarea>
          </div>
        </div>
      </div>
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
             <img src="" alt="Image Preview " class="image-preview__image" width="100px" height="100px">
             <span class="image-preview_default-text">Image Preview</span>
           </div>
         </div>
       </div>
     </div>

   </div>    
   <div class="modal-footer">
    <a href="{{base_url('barang/daftarbarang/')}}"><button type="button" class="btn btn-light">Cancel</button></a>
    <!-- value nya da di java script -->
    <input type="hidden" name="idBarang" id="idBarang"> 
    <input type="hidden" name="idBarcode" id="idBarcode">
    <button type="submit" class="btn btn-success" name="btnSubmit">Edit&Save</button>           
    <?php echo form_close();?>
  </div>
</div>
</div>
</div>

<!-- ######################################################################################################### -->

<!-- ######################################################################################################### -->

<!-- Modal Petunjuk-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Petunjuk Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>1)<b>PERBAHARUI !!</b>Keadaan Barang serta Keterangan Barang Apabila ingin Melakukan Transaksi dengan menekan tombol <i class="fas fa-edit fa-1x"></i></p>
        <p>2)Ceklist <i class="far fa-check-square fa-1x"></i> di kolom action untuk memilih barang </p>
        <p>3)Apabila sudah yakin dengan barang yang dipilih untuk dilakukannya transaksi,lalu
          Klik tombol <img src="{{base_url('assets/dist/img/pilih.JPG')}}" width="60px" height="25px"> </p>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">OK,Paham</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ######################################################################################################### -->
  <!-- End of Main Content -->
  @endsection

  @section('scripts-js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <script src="{{base_url('assets/plugins/popper/umd/popper.min.js')}}"></script>

  <script src="{{base_url('assets/plugins/jquery/jquery.PrintArea.js')}}"></script>
  
  <script type="text/javascript" src="{{base_url('assets/dist/js/jquery.mask.min.js')}}"></script>

  <script >
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


<script>
  $(document).ready(function(){
    var table = $('#dataTable').DataTable();

   /*   $('#dataTable tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected'); });*/
    var rowData = table.row( this ).data();
    $('#btncheckbox').click( function() {
      $( "#form_cek" ).submit();          
    });           
  }); 
</script>
<script type="text/javascript">
  $(document).on("click",'#btnedit',function(){

    var id=$(this).data('id');
    var id_barang=$(this).data('id_barang');
    var nama=$(this).data('nama');
    var ket_barang=$(this).data('ket_barang');
    var merk=$(this).data('merk');
    var no_pabrik=$(this).data('no_pabrik');
    var warna_barang=$(this).data('warna_barang');
    var bahan=$(this).data('bahan');
    var satuan=$(this).data('satuan');
    var harga_satuan=$(this).data('harga_satuan');
    var cara_peroleh=$(this).data('cara_peroleh');
    var tanggal_pengadaan=$(this).data('tanggal_pengadaan');
    var keadaan_barang=$(this).data('keadaan_barang');
    var lokasi=$(this).data('lokasi');
    var tanggal_rusak=$(this).data('tanggal_rusak');
    var fot=$(this).data('foto');
    $(".modal-footer #idBarcode").val(id);
    $(".modal-footer #idBarang").val(id_barang);
    $(".modal-body #namaBarang").val(nama);
    $(".modal-body #merkBarang").val(merk);
    $(".modal-body #noSertif").val(no_pabrik);
    $(".modal-body #warnaBarang").val(warna_barang);
    $(".modal-body #bahanBarang").val(bahan);
    $(".modal-body #warnaBarang").val(warna_barang);
    $(".modal-body #satuanBarang").val(satuan);
    $(".modal-body #caraBarang").val(cara_peroleh);
    $(".modal-body #tglBarang").val(tanggal_pengadaan);
    $(".modal-body #keadaanBarang").val(keadaan_barang);
    $(".modal-body #lokasiBarang").val(lokasi);
    $(".modal-body #ketBarang").val(ket_barang);
    $(".modal-body #tglBarangRusak").val(tanggal_rusak);
  //  $(".modal-body #fotoBar").val(fot);

  var reverse = harga_satuan.toString().split('').reverse().join(''),
  ribuan = reverse.match(/\d{1,3}/g);
  ribuan = ribuan.join('.').split('').reverse().join('');
  rupiah=ribuan;
  $(".modal-body #hargaBarang").val(rupiah);
  $( '.modal-body #hargaBarang' ).mask('000.000.000,00', {reverse: true});

});
</script>

<script type="text/javascript">
 $(document).ready(function() {

 });
</script>

<script type="text/javascript">

</script>


@endsection