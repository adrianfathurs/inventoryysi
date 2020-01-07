  @layout('template/main/barang/main')

  @section('content')
   
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <center> <h1 class="h3 mb-2 text-gray-800"><strong>YAYASAN SINAI INDONESIA</strong></h1></center>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">INVENTORY</h6>
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
                    </tr>
                  </thead>
                  <tbody>
              <!-- load table spesifikasi barang dan barang kedalam tabel  -->
                    <?php foreach($daftar as $d):
                   
                    ?>
                    
                    <tr>
                      <td>1</td>
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