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
 :root {
  --primary-color: #28a745;          /* Hijau utama */
  --bg-color: #e9f7ef;               /* Latar belakang lembut */
  --text-color: #1e4620;             /* Teks agak gelap dengan tone hijau */
  --sidebar-bg: #f1fdf4;             /* Sidebar dengan hijau sangat muda */
  --navbar-bg: #dff5e1;              /* Navbar hijau pastel */
  --nav-link-color: #2f5d3a;         /* Link warna hijau gelap */
  --nav-link-hover: #c8f3d0;         /* Hover hijau terang */
  --nav-link-active: #a3e4b5;        /* Aktif hijau segar */
  --navbar-height: 70px;
}

    .table th {
    font-size: 0.8rem; /* Ukuran font lebih kecil */
  }
  .table td {
    font-size: 0.9rem; /* Ukuran font lebih kecil untuk isi tabel */
  }
    body.dark-mode {
      --bg-color: #121212;
      --text-color: #f1f1f1;
      --sidebar-bg: #1e1e1e;
      --navbar-bg: #1c1c1c;
      --nav-link-color: #cfcfcf;
      --nav-link-hover: #2e2e2e;
      --nav-link-active: #333333;
    }

    body {
      background-color: var(--bg-color) !important;
      color: var(--text-color);
      font-family: 'Nunito', sans-serif;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar {
  background: linear-gradient(90deg, #dff5e1, #a7e9af) !important;
  border-bottom: none;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  position: sticky;
  top: 0;
  z-index: 1000;
  height: var(--navbar-height);
}


    .navbar .nav-link {
      color: var(--nav-link-color) !important;
      font-weight: 600;
      padding: 10px 15px;
      font-size: 16px;
      text-transform: uppercase;
      transition: color 0.3s ease, padding 0.3s ease;
    }

    .navbar .nav-link:hover {
      background-color: var(--nav-link-hover);
      color: var(--primary-color) !important;
      border-radius: 20px;
      padding-left: 20px;
      padding-right: 20px;
    }

    .main-sidebar {
      background-color: var(--sidebar-bg) !important;
      transition: all 0.3s ease;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 250px;
      box-shadow: 2px 0px 8px rgba(0,0,0,0.1);
    }

    .brand-text {
      color: var(--primary-color) !important;
      font-weight: bold;
      font-size: 22px;
      font-family: 'Nunito', sans-serif;
    }

    .user-panel .info a {
      color: var(--text-color);
      font-weight: bold;
      font-size: 16px;
    }

    .nav-sidebar .nav-link {
      color: var(--nav-link-color) !important;
      padding: 10px 15px;
      font-size: 14px;
      text-transform: uppercase;
    }

    .nav-sidebar .nav-link:hover {
      background-color: var(--nav-link-hover) !important;
      color: var(--primary-color) !important;
      border-radius: 10px;
    }

    .nav-sidebar .nav-link.active,
    .nav-sidebar .nav-item.menu-open > .nav-link {
      background-color: var(--nav-link-active) !important;
      color: var(--primary-color) !important;
      font-weight: 700;
    }

    .nav-header {
      color: #adb5bd !important;
    }

    /* Hover effect for sidebar items */
    .nav-item:hover {
      background-color: #f1f1f1;
      transition: background-color 0.3s ease;
    }

    /* Responsive Layout */
    @media (min-width: 768px) {
      .main-sidebar {
        width: 250px;
      }

      .content-wrapper {
        margin-left: 250px;
      }
    }

    /* Full screen width for content */
    .content-wrapper {
      max-width: 100%;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }

    /* Dark Mode Button Style */
    #dark-mode-toggle {
      transition: color 0.3s ease;
    }

    /* Smooth transition for dark mode */
    body {
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg" style="background: linear-gradient(90deg, #dff5e1, #a7e9af);">

    <div class="container-fluid">
      <!-- Sidebar toggle button -->
      <button class="navbar-toggler" type="button" data-widget="pushmenu" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand / Logo -->
      <a class="navbar-brand d-lg-none" href="{{ route('home') }}">Dashboard</a>

      <!-- Navbar toggler for collapse -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="toggleDarkMode()" id="dark-mode-toggle">
              <i class="fas fa-moon"></i> Mode Gelap
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar elevation-1">
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center px-3 py-2 shadow-sm rounded-3 bg-light" 
    style="transition: all 0.3s ease; display: flex; align-items: center; padding: 0.75rem 1rem; background-color: #f8f9fa; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-decoration: none;">
   <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-fluid rounded-circle me-3"
        style="width: 45px; height: 45px; opacity: 0.9; transition: transform 0.3s ease; cursor: pointer;">
   <span class="brand-text fs-4 fw-bold text-dark" 
         style="font-size: 1.25rem; font-weight: 600; color: #212529; transition: color 0.3s ease;"> 
     {{ $title ?? "Bank Sampah" }}
   </span>
 </a>
 

 <div class="sidebar py-3">
    <!-- User panel -->
    <div class="user-panel d-flex align-items-center p-3 mb-3 shadow-sm rounded-5" 
         style="background-color: #a2d9a1; transition: all 0.3s ease; border-radius: 15px;">
      <div class="image me-3">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" 
             alt="User Image" 
             class="img-fluid rounded-circle shadow-sm"
             style="width: 50px; height: 50px; object-fit: cover; transition: transform 0.3s ease;">
      </div>
      <div class="info">
        <a href="#" class="d-block text-dark fw-bold fs-5" 
           style="text-decoration: none; transition: color 0.3s ease; color: #2f5d3a;">
          {{ auth()->user()->name }}
        </a>
      </div>
    </div>
 
  

      <!-- Sidebar menu -->
                        <nav class="mt-2">
                          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">Menu Utama</li>
                            @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
                              {{-- menejemenen Pengguna      --}}
                              <li class="nav-item">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-user-circle fa-xs"></i>
                                  <p class="small">Daftar Pengguna <i class="right fas fa-angle-left"></i></p>
                                </a>
                              
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="{{ route('registrasi.index') }}" class="nav-link">
                                      <i class="fas fa-user-tie nav-icon fa-xs"></i>
                                      <p class="small">List Pengguna</p>
                                    </a>
                                  </li>
                                </ul> 
                              
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="{{ route('registrasi.create') }}" class="nav-link">
                                      <i class="fas fa-id-card nav-icon"></i>
                                      <p class="small">Tambah Pengguna</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>   
                              @endauth 
                              @if(in_array(auth()->user()->role_name, ['User', 'Admin','Admin Super']))
                    {{-- myprofile open       --}}
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle fa-xs"></i>
                        <p class="small">My Profile <i class="right fas fa-angle-left"></i></p>
                      </a>
                      @if(in_array(auth()->user()->role_name, ['Admin']))
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('ketua-rw.index') }}" class="nav-link">
                            <i class="fas fa-user-tie nav-icon fa-xs"></i>
                            <p class="small">My Profile RW</p>
                          </a>
                        </li>
                      </ul>
                      @endauth 
                      @if(in_array(auth()->user()->role_name, ['User']))
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('data_nasabah.index') }}" class="nav-link">
                            <i class="fas fa-id-card nav-icon"></i>
                            <p class="small">My Profile Nasabah</p>
                          </a>
                        </li>
                      </ul>
                      @endauth 
                      @if(in_array(auth()->user()->role_name, ['Super Admin']))
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('nama_rw.index') }}" class="nav-link">
                            <i class="fas fa-map-marker-alt nav-icon"></i>
                            <p class="small">Wilayah</p>
                          </a>
                        </li>
                      </ul>
                      @endauth 
                    </li>          
                    @endauth
                      {{-- kelola sampah --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-broom fa-xs"></i>
                          <p class="small">Kegiatan Bank Sampah <i class="right fas fa-angle-left"></i></p>
                        </a>
                        @if(auth()->user()->role_name == 'Super Admin')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('pengumuman.index') }}" class="nav-link">
                                <i class="fas fa-bullhorn nav-icon"></i>
                                <p class="small">Data Pengumuman</p>
                              </a>
                            </li>
                          </ul> 
                          <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('nama_rw.index') }}" class="nav-link">
                                    <i class="fas fa-map-marker-alt nav-icon"></i> <!-- Ikon untuk wilayah -->
                                    <p class="small">Profile Wilayah</p>
                                </a>
                            </li>
                        </ul>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('klasifikasi_sampah.index') }}" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p class="small">Jenis Sampah</p>
                            </a>
                            </li>
                          </ul>
                          @endif
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('jadwal.index') }}" class="nav-link">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p class="small">Jadwal Penjemputan</p>
                              </a>
                            </li>
                          </ul>   
                                    
                      </li>   

                      {{-- alur keuangan open --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-wallet fa-xs"></i>
                            <p class="small">Keuangan <i class="right fas fa-angle-left"></i></p>
                            </a>
                            @if(in_array(auth()->user()->role_name, ['Super Admin']))
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/laporan/jenis-sampah" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p class="small">Rekap Keseluruhan</p>
                                </a>
                            </li>
                            </ul>
                            @endauth
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('buku_keuangan_nasabah_masuk.index') }}" class="nav-link">
                                  <i class="fas fa-chart-line nav-icon"></i>
                                  <p class="small">Keuangan Nasabah</p>
                                  </a>
                              </li>
                              </ul>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{ route('laporan_bulanan.index') }}" class="nav-link">
                                    <i class="fas fa-chart-line nav-icon"></i>
                                    <p class="small">Keuangan RW</p>
                                    </a>
                                </li>
                                </ul>
                        </li>                     
                        
                        {{-- Laporan --}}
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-file-alt fa-xs"></i> <!-- Ganti ikon utama ke laporan -->
                              <p class="small">Menu Laporan <i class="right fas fa-angle-left"></i></p>
                          </a>
                      
                          @if(in_array(auth()->user()->role_name, ['User', 'Admin', 'Super Admin']))
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="fas fa-receipt nav-icon fa-xs"></i> <!-- Ganti ke receipt untuk laporan nasabah -->
                                      <p class="small">Laporan Keuangan Nasabah</p>
                                  </a>
                              </li>
                          </ul>
                          @endif
                      
                          @if(in_array(auth()->user()->role_name, ['Admin', 'Super Admin']))
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="fas fa-university nav-icon fa-xs"></i> <!-- Ganti ke university untuk RW -->
                                      <p class="small">Laporan Keuangan RW</p>
                                  </a>
                              </li>
                          </ul>
                          @endif
                      
                          @if(in_array(auth()->user()->role_name, ['Super Admin']))
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="fas fa-clipboard-list nav-icon fa-xs"></i> <!-- Induk laporan -->
                                      <p class="small">Laporan Induk</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="fas fa-flag-checkered nav-icon fa-xs"></i> <!-- Akhir laporan -->
                                      <p class="small">Laporan Akhir</p>
                                  </a>
                              </li>
                          </ul>
                          @endif
                      </li>
                      
                      
                      {{-- FAQ --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-question-circle fa-xs"></i>
                            <p class="small">Ajukan Penjemputan<i class="right fas fa-angle-left"></i></p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('faqs.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon fa-xs"></i>
                                    <p class="small">Ajukan Penjemputan</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('faqs.create') }}" class="nav-link">
                                    <i class="fas fa-comment-dots nav-icon fa-xs"></i>
                                    <p class="small">Ajukan</p>
                                </a>
                            </li>
                        </ul>
                      </li>
                      {{-- FAQ tutup --}}         
                      @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
                      {{-- kegiatan --}}
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-camera-retro fa-xs"></i>
                            <p class="small">Dokumentasi Kegiatan <i class="right fas fa-angle-left"></i></p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dok_kegiatan.index') }}" class="nav-link">
                                    <i class="fas fa-images nav-icon fa-xs"></i>
                                    <p class="small">List Kegiatan</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dok_kegiatan.create') }}" class="nav-link">
                                    <i class="fas fa-plus-circle nav-icon fa-xs"></i>
                                    <p class="small">Tambah Kegiatan</p>
                                </a>
                            </li>
                        </ul>
                      </li>
                      @endauth 
                      {{-- kegiatan tutup --}}

        </ul>
      </nav>
    </div>
  </aside>
  <!-- /.sidebar -->

  <!-- Content -->
  @yield('content')
  <!-- /.content -->

</div>

<!-- Scripts -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<!-- Di bagian bawah sebelum penutupan </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Fungsi untuk mengaktifkan atau menonaktifkan dark mode
    function toggleDarkMode() {
      document.body.classList.toggle('dark-mode');
      // Simpan status dark mode ke localStorage
      localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
      updateToggleLabel();
    }
  
    // Update label pada tombol sesuai mode
    function updateToggleLabel() {
      const isDark = document.body.classList.contains('dark-mode');
      const toggle = document.getElementById('dark-mode-toggle');
      toggle.innerHTML = isDark ? '<i class="fas fa-sun"></i> Mode Terang' : '<i class="fas fa-moon"></i> Mode Gelap';
    }
  
    // Fungsi untuk memuat preferensi dark mode ketika halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
      // Cek apakah preferensi dark mode ada di localStorage
      if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
      }
      updateToggleLabel();
    });
  </script>
  
</body>
</html>
