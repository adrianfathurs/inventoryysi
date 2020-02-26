@if($active === 'DaftarBarang' || $active === 'TambahBarang' || $active === 'HistoryMutasi' )
<li class="nav-item has-treeview menu-open ">
    <a href="{{base_url('barang')}}" class="nav-link ">
        @else
<li class="nav-item has-treeview menu ">
    <a href="{{base_url('barang')}}" class="nav-link">
        @endif
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p><strong>
            BARANG YSI</strong>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <!-- ########################################################-->
    <ul class="nav nav-treeview">
        
        <li class="nav-item active">
           @if($active === 'DaftarBarang')
            <a href="{{base_url('barang/daftarbarangview')}}" class="nav-link active">
                @else
            <a href="{{base_url('barang/daftarbarangview')}}" class="nav-link ">
                @endif
              <i class=" far fas fa-toolbox nav-icon"></i>
              <p>Daftar Barang</p>
          </a>
      </li>
      
      <li class="nav-item active">
        @if($active === 'TambahBarang')
        <a href="{{base_url('barang/tambahbarang')}}" class="nav-link active">
            @else
        <a href="{{base_url('barang/tambahbarang')}}" class="nav-link">
            @endif

            <i class="far fas fa-plus-square nav-icon"></i>
            <p>Tambah Barang</p>      
        </a>
    </li>
    <li class="nav-item">
        @if($active === 'HistoryMutasi')
        <a href="{{base_url('barang/historymutasi')}}" class="nav-link active">
            @else
        <a href="{{base_url('barang/historymutasi')}}" class="nav-link">
            @endif

         <i class="far fas fa-chart-area nav-icon"></i></i>
         <p>History Mutasi</p>      
     </a>
 </li>
</ul>
</li>
<!-- #################################################### -->
@if($active === 'TransaksiBarang' || $active === 'HistoryTransaksi')
<li class="nav-item has-treeview menu-open">
    <a href="{{base_url('barang')}}" class="nav-link  ">
        @else
<li class="nav-item has-treeview menu">
    <a href="{{base_url('barang')}}" class="nav-link">
        @endif
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p><strong>
            TRANSAKSI</strong>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if($active==='TransaksiBarang')
            <a href="{{base_url('barang/daftarbarang')}}"  class="nav-link active">
                @else
            <a href="{{base_url('barang/daftarbarang')}}"  class="nav-link ">
                @endif
                <i class="far fas fa-handshake nav-icon"></i>
                <p>Transaksi Barang</p>
            </a>
        </li>
        <li class="nav-item">
             @if($active==='HistoryTransaksi')
            <a href="{{base_url('transaksi/historyTransaksi')}}"  class="nav-link active">
                @else
            <a href="{{base_url('transaksi/historyTransaksi')}}"  class="nav-link">
                @endif
                <i class="far fas fa-chart-area nav-icon"></i></i>
                <p>History Transaksi</p>
            </a>
        </li>
        
    </ul>
</li>

<!-- #################################################### -->

<li>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="{{base_url('start/logout')}}" ><img src="{{base_url('assets/dist/img/logout3.png')}}" class="img-circle elevation-4" alt="logout"></a>
            </div>
            <div class="info">
                <p><span class="warna">Logout/Keluar</span></p>
            </div>
        </div>
    </div>
</li>