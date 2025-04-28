<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Bank Sampah" }} | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #83ca00 !important;
    }
    .main-header, .main-sidebar, .brand-link {
      background-color: #5F8D37 !important;
    }
    .nav-sidebar .nav-item > .nav-link.active {
      background-color: #4E752E !important;
      color: white !important;
    }
    .navbar-white {
      background-color: #5F8D37 !important;
      border-bottom: none;
    }
    .content-wrapper {
      background-color: #F0F5E1 !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link" style="color: rgb(245, 236, 236);">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" style="color: #F0F5E1">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white">{{ $title ?? "Bank Sampah" }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p class="text-white">
                            Kegiatan Bank Sampah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('jadwal.index') }}" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p class="text-white">Jadwal Penjemputan</p>
                            </a>
                        </li> 
                        @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))                          
                        <li class="nav-item">
                            <a href="{{ route('klasifikasi_sampah.index') }}" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p class="text-white">Jenis Sampah</p>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p class="text-white">
                            Alur Keuangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        @if(in_array(auth()->user()->role_name, ['User', 'Admin']))
                        <li class="nav-item">
                            <a href="{{ route('buku_tabungan.index') }}" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p class="text-white">Buku Tabungan</p>
                            </a>
                        </li>
            @endauth
                        @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
                        <li class="nav-item">
                            <a href="{{ route('laporan_bulanan.index') }}" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p class="text-white">Rekap Bulanan</p>
                            </a>
                        </li> 
                         @endauth 
                         @if(auth()->user()->role_name == 'Super Admin')
                         <li class="nav-item">
                            <a href="/laporan/jenis-sampah" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p class="text-white">Rekap keseluruhan</p>
                            </a>
                        </li>
                         @endauth                      
                    </ul>
                </li>
                @auth
                @if(auth()->user()->role_name == 'Super Admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p class="text-white">
                                Pengumuman
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('pengumuman.index') }}" class="nav-link">
                                    <i class="fas fa-bell nav-icon"></i>
                                    <p class="text-white">Pengumuman</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endauth
            
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p class="text-white">
                            FAQ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('faqs.index') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p class="text-white">List Pesan</p>
                            </a>
                            <a href="{{ route('faqs.create') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p class="text-white">Buat Pesan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @auth
                @if(auth()->user()->role_name == 'Super Admin' || auth()->user()->role_name == 'Admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p class="text-white">
                            Menejemen Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('registrasi.index') }}" class="nav-link">
                                <i class="fas fa-user-cog nav-icon"></i>
                                <p class="text-white">List Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            @endauth     
            @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-camera"></i>
                    <p class="text-white">
                        Dokumentasi Kegiatan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('dok_kegiatan.index') }}" class="nav-link">
                            <i class="fas fa-image nav-icon"></i>
                            <p class="text-white">List Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>       
            @endauth 
            @if(in_array(auth()->user()->role_name, ['User', 'Admin']))
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-circle"></i> <!-- Ganti dengan icon yang sesuai -->
                    <p class="text-white">
                        My Profile
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                @if(auth()->user()->role_name == 'Admin')
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('ketua-rw.index') }}" class="nav-link">
                            <i class="fas fa-users-cog nav-icon"></i> <!-- Ganti dengan icon yang sesuai -->
                            <p class="text-white">Ketua RW</p>
                        </a>
                    </li>
                </ul>
            @endauth
            @if(auth()->user()->role_name == 'User')
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('data_nasabah.index') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i> <!-- Ganti dengan icon yang sesuai -->
                        <p class="text-white">Nasabah</p>
                    </a>
                </li>
            </ul>
            @endauth
            @if(auth()->user()->role_name == 'Super Admin')
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('nama_rw.index') }}" class="nav-link">
                        <i class="fas fa-map-marker-alt nav-icon"></i> <!-- Ikon untuk wilayah -->
                        <p class="text-white">Profile Wilayah</p>
                    </a>
                </li>
            </ul>
            @endauth

                
            </li>     
            @endauth   

            </ul>
        </nav>
    </div>
    
</aside>



  @yield('content')

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<!-- Di bagian bawah sebelum penutupan </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
