<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi Pelanggaran dan Prestasi Trimurti</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/shared/style.css')}}">
    
    {{-- sweetalert2 --}}
    <script src="{{asset('admin/assets/sweetalert2/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin/assets/sweetalert2/sweetalert2.min.css')}}">
    

    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />
    {{-- <link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css"> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"> --}}
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
          <form class="t-header-search-box" method="GET" action="/siswa/cari">
            <div class="input-group">
              <input name="cari" type="search" class="form-control" id="inlineFormInputGroup" placeholder="Search" >
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form>
          <ul class="nav ml-auto">
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
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{asset('admin/assets/images/profile/male/image_1.png')}}" alt="profile image">
          </div>
          <div class="info-wrapper">
            {{-- <p class="user-name">{{auth()->user()->name}}</p> --}}
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          <li>
            <a href="index.html">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li>
            <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Import Master Data</span>
              <i class="mdi mdi-table-large link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="{{ url('bk/mastersiswa') }}" >Siswa</a>
              </li>
              <li>
                <a href="{{ url('bk/masterwalmur') }}" >Wali Murid</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#sample-pages1" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Master Data</span>
              <i class="mdi mdi-table-large link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages1">
              <li>
                <a href="{{ url('bk/masterkelas') }}" >Kelas</a>
              </li>
              <li>
                <a href="{{ url('bk/mastertahunajaran') }}">Tahun ajaran</a>
              </li>
              <li>
                <a href="{{ url('bk/masterkategoripel') }}">Kategori pelanggaran</a>
              </li>
              <li>
                <a href="{{ url('bk/masterkategoripres') }}">Kategori prestasi</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ url('bk/masterkelassiswa') }}">
              <span class="link-title">Kelas siswa</span>
              <i class="mdi mdi-account-multiple link-icon"></i>
            </a>
          </li>
          
          <li class="nav-category-divider">Logout</li>
          <li>
            <a href="{{ url('/bk/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="link-title">Logout</span>
                <i class="mdi mdi-logout-variant link-icon"></i>
            </a>
            <form id="logout-form" action="{{ url('/bk/logout') }}" method="POST" style="display: none;">
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
              <small class="text-gray mt-2">Made by Daffa Akbar  <i class="mdi mdi-heart text-danger"></i></small>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    @include('sweet::alert')

    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/js/core.js')}}"></script>
    {{-- <script src="{{asset('admin/assets/vendors/js/core.js')}}"></script> --}}
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chartjs.addon.js')}}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{asset('admin/assets/js/template.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link href="{{asset('admin/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/select2/css/select2.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/assets/select2/js/select2.min.js')}}"></script>    
    <script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>
    <script>
      $(document).ready(function() {
      $('.js-example-basic-single').select2();  
      });
      </script>
    {{-- @include('sweet::alert') --}}
    {{-- @include('sweetalert::alert') --}}
    <!-- endbuild -->
  </body>
</html>