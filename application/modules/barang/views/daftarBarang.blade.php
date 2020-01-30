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
    #exampleModalCenter
      {
        display:none;
        position: fixed;
      }
    #btncheckbox{
      margin-top: 20px;
      margin-left: 40px;
    }
   </style>
  @endsection
  @section('scripts-js')
  <script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#bodyTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

       /*$("#cek").click(function(){
          $("#btncheckbox").css({ "background-color":"  #7CFC00"});     
        });*/

        $('#btncheckbox').click(function() {
    $('#form_cek').submit();
    });
      });
  </script>
  @endsection
  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>
         <?= $this->session->tempdata('message');?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="card-header">
                  <button name="btnsubmit" id="btncheckbox" class="btn btn-primary py-8 px-8"  type="submit">PILIH BARANG</button>
                  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                    <div class="input-group">
                      <input id="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                       <div class="input-group-append">
                         <button class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
                      </div>  
                    </div>
                </form>
                
               </div>
                



            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Nama Barang</center></th>
                      <th><center>Merk</center></th>
                      <th><center>No. Pabrik</center></th>
                      <th><center>Bahan</center></th>
                      <th><center>Cara Peroleh</center></th>
                      <th><center>Tanggal Perolehan</center></th>
                      <th><center>Warna Barang</center></th>
                      <th><center>Satuan</center></th>
                      <th><center>Keadaan Barang</center></th>
                      <th><center>Harga/Satuan</center></th>
                      <th><center>Tanggal Rusak</center></th>
                      <th><center>Lokasi</center></th>
                      <th><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody id="bodyTable">
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
                    <form id="form_cek" name="form_cek" method="POST" action="{{base_url('barang/selectbarcode/')}}" >  
                    <?php foreach($daftar as $d):
                   
                    ?>
                 
                    <tr>
                      <td>{{$d['id_barcode']}}</td>
                     <?php 
                     $id=$d['id_barcode'];
                     $idbarang=$d['id_barang'];
                     $iddepartement=$d['id_departement'];
                     $idyayasan=$d['id_yayasan'];
                      $date=strtotime($d['tanggal_pengadaan']);
                          $date_month=date('n',$date);
                          $date_year=date('y',$date);

                     ?>
                      <td><center><?=strtoupper($d['nama_barang'])?></center></td>
                      <td><center><?=strtoupper($d['merk'])?></center></td>
                      <td><center><?=strtoupper($d['no_pabrik'])?></center></td>
                      <td><center><?=strtoupper($d['bahan'])?></center></td>
                      <td><center><?=strtoupper($d['cara_peroleh'])?></center></td>
                      <td><center><?=$d['tanggal_pengadaan']?></center></td>
                      <td><center><?=strtoupper($d['warna_barang'])?></center></td>
                      <td><center><?=strtoupper($d['satuan'])?></center></td>
                      <td><center><?=strtoupper($d['keadaan_barang'])?></center></td>
                      <td><center><?=$d['harga_satuan']?></center></td>
                      <td><center><?=$d['tanggal_rusak']?></center></td>
                      <td><center><?=strtoupper($d['lokasi'])?></center></td>
                      <td>



                        <!-- SYNTAX CHECK BOX -->
                  
                     <input id="cek" type="checkbox" name="idbarcode[]" value="{{$d['id_barcode']}}"> &nbsp;
                  
                  <!-- INI YANG NGGA ERROR -->    
                      <!-- selecting Barang -->
 <!--                        <a href="{{base_url('transaksi/selectidbarcode/').$id.'/'.$idbarang.'/'.$iddepartement.'/'.$idyayasan.'/'.$date_month.'/'.$date_year}}" ><i class="fas selecting fa-hand-pointer "></i></a>
  -->                       <!-- Hapus Barang -->
                        <!-- <a href="{{base_url('barang/deleteidbarcode/').$id}}"><i class="fas deleting fa-trash-alt " ></i></a> -->

                        <!-- link trigger modal -->
                        <a   id="button" data-toggle="modal" data-target="#exampleModalCenter">
                           <i class="fas deleting fa-trash-alt fa-1x "></i>
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
                                Benarkah Anda Akan Menghapus Data Ini?
                              </div>
                              <div class="modal-footer">
                                  <a href="{{base_url('barang/daftarbarang/')}}"><button type="button" class="btn btn-light">Cancel</button></a> 
                                  <a href="{{base_url('barang/deleteidbarcode/').$id}}"><button type="button" class="btn btn-danger">DELETE</button></a>                           
                              </div>
                            </div>
                          </div>
                        </div>
                          
                      </td>
                    </tr>

                    <?php
                    endforeach;
                    ?>
                     </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>  
      <!-- End of Main Content -->
@endsection
