<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/plugins/summernote/summernote-bs4.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="{{base_url('assets/plugins/select2/css/select2.min.css')}}">
  @yield('scripts-css')
  <!-- PANGGIL UNTUK INJEK CSS KE TEMPAT INI -->
</head>

<body class="hold-transition text-sm sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
      <form class="form-inline ml-3">
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar bg-gray-dark elevation-4">
      <a href="index3.html" class="brand-link">
        <img src="{{base_url('assets/dist/img/TeladanPutih.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">YAYASAN SINAI INDONESIA</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{base_url('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
             <?php 
              if(isset($_SESSION['status']))
                {
                  
                  if($_SESSION['status']==1)
                  {
                    $stat="Admin";
                    $nama=$_SESSION['nama'];
                  $jabatan=$_SESSION['nama_jabatan'];
                  }
                  else if($_SESSION['status'])
                  {
                    $stat="Direktur";
                    $nama=$_SESSION['nama'];
                  $jabatan=$_SESSION['nama_jabatan'];

                  }

                }
              else
              {
                $nama="USER";
              }
              ?>
            <p  class="d-block"><strong>{{$nama}}</strong></p>
            <center><p  class="d-block">{{$jabatan.' '.'/'.' '.$stat}}</p></center>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            
            @if($status == 'admin')
             @include('template/menu/admin/menu')
            @endif  
            @if($status == 'direktur')
             @include('template/menu/direktur/menu')
            @endif
            @if($status == 'user')
             @include('template/menu/user/menu')
            @endif
            

             
           
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"></h1>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          @yield('content')
          <!-- PANGGIL UNTUK INJEK CONTENT KE TEMPAT INI -->
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0
      </div>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
  </div>
  <script src="{{base_url('assets/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{base_url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="{{base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{base_url('assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{base_url('assets/plugins/jquery/printThis.jquery.json')}}"></script>
  <script src="{{base_url('assets/plugins/jquery/printThis.js')}}"></script>
  
  <script src="{{base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <script src="{{base_url('assets/dist/js/adminlte.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script  src="{{base_url('assets/plugins/select2/js/select2.full.min.js')}}"></script>
  
  <script src="{{base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <!-- DataTables -->
  

  @yield('scripts-js')
</body>

</html>