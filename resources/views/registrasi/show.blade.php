@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-md-6">
          <h1 class="m-0"><i class="fas fa-user-circle"></i> Detail Pengguna</h1>
        </div>
        <div class="col-md-6 text-right">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('registrasi.index') }}">Daftar Pengguna</a></li>
            <li class="breadcrumb-item active">Detail Pengguna</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Lengkap Pengguna</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-center mb-4">
            <div class="col-md-4 text-center" data-aos="zoom-in">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <i class="fas fa-user fa-3x text-primary mb-3"></i>
                  <h5 class="card-title">Nama</h5>
                  <p class="text-muted">{{ $registrasi->name }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-delay="100">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <i class="fas fa-envelope fa-3x text-success mb-3"></i>
                  <h5 class="card-title">Email</h5>
                  <p class="text-muted">{{ $registrasi->email }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-delay="200">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <i class="fas fa-user-tag fa-3x text-warning mb-3"></i>
                  <h5 class="card-title">Role</h5>
                  <p class="text-muted">{{ $registrasi->role_name }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Bagian tambahan -->
          <div class="row text-center mb-4">
            <div class="col-md-12" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box shadow">
                <i class="fas fa-user-clock text-primary mb-2"></i>
                <h5 class="mb-1">Terdaftar Sejak</h5>
                <p class="text-muted">{{ $registrasi->created_at->format('d M Y') }}</p>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection

@push('scripts')
<!-- AOS Animation -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>
@endpush

@push('styles')
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
@endpush
