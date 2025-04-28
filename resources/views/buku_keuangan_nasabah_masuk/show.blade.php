@extends('adminlte.layouts.app')

@section('content')

<div class="content-wrapper">
  <div class="content-header" style="background-image: url('{{ asset('assets/main1/img/header-bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center text-black text-center">
        <div class="col-sm-6">
          <h1 class="m-0">
            <i class="fas fa-book text-warning"></i> <span class="text-shadow">Detail Pemasukan Nasabah</span>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fas fa-folder-open"></i> <span class="text-info">Detail Pemasukan Nasabah</span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content mt-4">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-lg border-light rounded">
            <div class="card-header bg-gradient-info text-white">
              <h3 class="card-title">
                <i class="fas fa-info-circle"></i> <strong>Detail Pemasukan Nasabah</strong>
              </h3>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <a href="{{ route('buku_keuangan_nasabah_masuk.index') }}" class="btn btn-outline-primary shadow-sm">
                  <i class="fas fa-arrow-left"></i> <strong>Kembali ke Daftar Pemasukan</strong>
                </a>
              </div>
              
              <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                  <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Tanggal Masuk</strong>
                      <span class="badge bg-light text-dark">{{ $pemasukan->tanggal_masuk }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Nama Nasabah</strong>
                      <span class="badge bg-light text-dark">{{ $pemasukan->nasabah->user->name }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Nama RW</strong>
                      <span class="badge bg-light text-dark">{{ $pemasukan->nasabah->namaRw->nama_rw }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>No Telepon</strong>
                      <span class="badge bg-light text-dark">{{ $pemasukan->nasabah->no_telepon }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Jenis Kelamin</strong>
                      <span class="badge bg-light text-dark">{{ ucfirst($pemasukan->nasabah->jenis_kelamin) }}</span>
                    </div>
                  </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                  <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Foto Profil</strong>
                      <span class="badge bg-light text-dark">
                        @if($pemasukan->nasabah->foto_profil)
                          <img src="{{ asset('storage/'.$pemasukan->nasabah->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded-circle shadow-sm" width="100">
                        @else
                          <span>--</span>
                        @endif
                      </span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Jenis Sampah</strong>
                      <span class="badge bg-success text-white">{{ $pemasukan->klasifikasiSampah->jenis_sampah }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Kategori Sampah</strong>
                      <span class="badge bg-warning text-dark">{{ $pemasukan->klasifikasiSampah->kategori_sampah }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Harga Per Kg</strong>
                      <span class="badge bg-info text-white">Rp {{ number_format($pemasukan->klasifikasiSampah->harga_beli, 2) }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Jumlah Berat</strong>
                      <span class="badge bg-secondary text-white">{{ $pemasukan->jumlah_berat }} kg</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Jumlah Masuk</strong>
                      <span class="badge bg-danger text-white">Rp {{ number_format($pemasukan->jumlah_masuk, 2) }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <small>Terakhir diperbarui: {{ \Carbon\Carbon::parse($pemasukan->updated_at)->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

@section('css')
<!-- Add some custom CSS for background gradient and button hover effect -->
<style>
  .content-header {
    padding: 50px 0;
    background-color: rgba(0, 0, 0, 0.3);
    text-align: center;
  }
  .text-shadow {
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
  }
  .btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
    transition: background-color 0.3s ease;
  }
  .card-header, .card-footer {
    border-radius: 8px;
  }
  .list-group-item {
    transition: transform 0.3s ease;
  }
  .list-group-item:hover {
    transform: translateX(5px);
    background-color: #f8f9fa;
  }
</style>
@endsection

@section('js')
<!-- You can add JS here for additional interactivity if needed -->
<script>
  // Optional JavaScript to handle specific interactivity, like tooltips or animations
</script>
@endsection
