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

    
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    {{-- <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" /> --}}
  
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
          <form class="t-header-search-box" method="GET" action="/walimurid/cari">
            <div class="input-group">
              <input name="cari" type="search" class="form-control" id="inlineFormInputGroup" placeholder="Search" >
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form>
          {{-- <ul class="nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline mdi-1x"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Notifications</h6>
                  <p class="dropdown-title-text">You have 4 unread notification</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                      <i class="mdi mdi-alert"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Storage Full</small>
                      <small class="content-text">Server storage almost full</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-success text-success">
                      <i class="mdi mdi-cloud-upload"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Upload Completed</small>
                      <small class="content-text">3 Files uploded successfully</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning">
                      <i class="mdi mdi-security"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Authentication Required</small>
                      <small class="content-text">Please verify your password to continue using cloud services</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-message-outline mdi-1x"></i>
                <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Messages</h6>
                  <p class="dropdown-title-text">You have 4 unread messages</p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{asset('admin/assets/images/profile/male/image_1.png')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Clifford Gordon</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="{{asset('admin/assets/images/profile/female/image_2.png')}}" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Rachel Doyle</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                  <div class="dropdown-list">
                    <div class="image-wrapper">
                      <img class="profile-img" src="../assets/images/profile/male/image_3.png" alt="profile image">
                      <div class="status-indicator rounded-indicator bg-warning"></div>
                    </div>
                    <div class="content-wrapper">
                      <small class="name">Lewis Guzman</small>
                      <small class="content-text">Lorem ipsum dolor sit amet.</small>
                    </div>
                  </div>
                </div>
                <div class="dropdown-footer">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
          </ul> --}}
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
            <p class="user-name">Hallo {{auth()->user()->namewm}}</p>
            {{-- <h6 class="display-income">$3,400,00</h6> --}}
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="{{ url('walimurid/dashboardsiswa') }}">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="{{ url('walimurid/laporanpelanggaransiswa') }}">
              <span class="link-title">Laporan pelanggaran</span>
              <i class="mdi mdi-account-minus link-icon"></i>
            </a>
          </li>
          <li>
            <a href="{{ url('walimurid/laporanprestasisiswa') }}">
              <span class="link-title">Laporan prestasi</span>
              <i class="mdi mdi-account-plus link-icon"></i>
            </a>
          </li>
          <li class="nav-category-divider">Logout</li>
          <li>
            <a href="{{ url('/walimurid/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="link-title">Logout</span>
                <i class="mdi mdi-logout-variant link-icon"></i>
            </a>
            <form id="logout-form" action="{{ url('/walimurid/logout') }}" method="POST" style="display: none;">
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
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/core.js')}}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chartjs.addon.js')}}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{asset('admin/assets/js/template.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/js/vendor.addons.js')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chartjs.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- endbuild -->
    @yield('footer');
  </body>
</html>