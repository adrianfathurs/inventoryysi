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
   </style>
  @endsection

  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="card-header">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Merk</th>
                      <th>No Pabrik</th>
                      <th>Bahan</th>
                      <th>Cara Peroleh</th>
                      <th>Perolehan</th>
                      <th>Warna Barang</th>
                      <th>Satuan</th>
                      <th>Keadaan Barang</th>
                      <th>Harga/satuan</th>
                      <th>Tgl_rusak</th>
                      <th>Lokasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
                    <?php foreach($daftar as $d):
                   
                    ?>
                    
                    <tr>
                      <td>1</td>
                     <?php $id=$d['id_barcode'];?>
                      <td><?=$d['nama_barang']?></td>
                      <td><?=$d['merk']?></td>
                      <td><?=$d['no_pabrik']?></td>
                      <td><?=$d['bahan']?></td>
                      <td><?=$d['cara_peroleh']?></td>
                      <td><?=$d['tanggal_pengadaan']?></td>
                      <td><?=$d['warna_barang']?></td>
                      <td><?=$d['satuan']?></td>
                      <td><?=$d['keadaan_barang']?></td>
                      <td><?=$d['harga_satuan']?></td>
                      <td><?=$d['tanggal_rusak']?></td>
                      <td><?=$d['lokasi']?></td>
                      <td>
                        <!-- selecting Barang -->
                        <a href="{{base_url('barang/selectidbarcode/').$id}}"><i class="fas selecting fa-hand-pointer "></i></a>
                        <!-- Hapus Barang -->
                        <a href="{{base_url('barang/deleteidbarcode/').$id}}"><i class="fas deleting fa-trash-alt " ></i></a>
                      </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>  
      <!-- End of Main Content -->
@endsection
