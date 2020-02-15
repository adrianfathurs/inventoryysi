<li class="nav-item has-treeview menu-open">
    <a href="{{base_url('barang')}}" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Inventaris YSI
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{base_url('barang/daftarbarangview')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Barang</p>
            </a>
        </li>
        
       <li class="nav-item">
        <a href="{{base_url('barang/historymutasi')}}" class="nav-link">

         <i class="far fas fa-chart-area nav-icon"></i></i>
         <p>History Mutasi</p>      
     </a>
 </li>
    </ul>
</li>
<li class="nav-item has-treeview menu-open">
    <a href="{{base_url('barang')}}" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            TRANSAKSI
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{base_url('transaksi/historyTransaksi')}}"  class="nav-link ">
                <i class="far fas fa-chart-area nav-icon"></i></i>
                <p>History Transaksi</p>
            </a>
        </li>
        
    </ul>
</li>

<li>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{base_url('assets/dist/img/logout.png')}}" class="img-circle elevation-2" alt="logout">
            </div>
            <div class="info">
                <a href="{{base_url('start/logout')}}" class="d-block">Logout</a>
            </div>
        </div>
    </div>
</li>