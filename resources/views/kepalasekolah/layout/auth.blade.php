<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi Pelanggaran dan Prestasi Trimurti</title>
    <link rel="shortcut icon" href="{{asset('admin/assets/images/trim.ico')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/shared/style.css')}}">

    {{-- sweetalert2 --}}
    
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    {{-- <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" /> --}}

    {{-- SCRIPT TABULATOR DAN DOWNLOAD PDF --}}
    <link href="https://unpkg.com/tabulator-tables@4.7.0/dist/css/tabulator.min.css" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.5/jspdf.plugin.autotable.js"></script> --}}



    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="index.html">
          <img class="logo" src="{{asset('admin/assets/images/smatrimurti.png')}}" alt="">
          <img class="logo-mini" src="{{asset('admin/assets/images/trimurti.gif')}}" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          {{-- <form class="t-header-search-box" method="GET" action="/siswa/cari">
            <div class="input-group">
              <input name="cari" type="search" class="form-control" id="inlineFormInputGroup" placeholder="Search" >
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form> --}}
          
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg" src="{{asset('admin/assets/images/trimurti.gif')}}" style="height:90px;width:70px" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">Hallo {{auth()->user()->name}}</p>
            
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="{{ url('kepalasekolah/dashboard') }}">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          
          <li>
            <a href="#sample-pages1" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Laporan perkelas</span>
              <i class="mdi mdi-book-multiple-variant link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages1">
              <li>
                <a href="{{ url('kepalasekolah/laporanpelanggaran') }}" >Laporan pelanggaran</a>
              </li>
              <li>
                <a href="{{ url('kepalasekolah/laporanprestasi') }}" >Laporan prestasi</a>
              </li>
            </ul>
          </li>
          <li class="nav-category-divider">Logout</li>
          <li>
            <a href="{{ url('/kepalasekolah/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="link-title">Logout</span>
                <i class="mdi mdi-logout-variant link-icon"></i>
            </a>
            <form id="logout-form" action="{{ url('/timketertiban/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

          </li>
        </ul>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        
        
        @yield('content')
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="row">
            
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2020 <a href="http://smatrimurti.sch.id/" target="_blank">SMA Trimurti</a>. All rights reserved</small>
              {{-- <small class="text-gray mt-2">Made by Daffa Akbar  <i class="mdi mdi-heart text-danger"></i></small> --}}
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    {{-- @include('sweet::alert') --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    {{-- <script async src="//www.instagram.com/embed.js"></script> --}}
    {{-- INI YG DIHAPUS --}}
    <script src="{{asset('admin/assets/vendors/js/core.js')}}"></script>
    
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chartjs.addon.js')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chartjs.js')}}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{asset('admin/assets/js/template.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
  

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
  
    <link href="{{asset('admin/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('admin/assets/select2/css/select2.css')}}" rel="stylesheet" /> --}}
    <script src="{{asset('admin/assets/select2/js/select2.min.js')}}"></script>    
    <script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>
    <script>
      $(document).ready(function() {
      $('.js-example-basic-single').select2();  
      });
      </script>
      @yield('footer');
      
  </body>
  
</html>
