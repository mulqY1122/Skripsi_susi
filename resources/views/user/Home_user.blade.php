@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid py-4">

    <!-- Header Section -->
    <!-- Header Section -->
<div class="p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center text-white shadow-lg position-relative overflow-hidden"
style="background: linear-gradient(135deg, #4CAF50, #81C784); border-radius: 3rem;">

<!-- Decorative circles -->
<div style="position: absolute; top: -60px; right: -60px; width: 180px; height: 180px; background-color: rgba(255,255,255,0.07); border-radius: 50%; z-index: 0;"></div>
<div style="position: absolute; bottom: -40px; left: -40px; width: 100px; height: 100px; background-color: rgba(255,255,255,0.05); border-radius: 50%; z-index: 0;"></div>

<!-- Text Section -->
<div class="text-center text-md-start position-relative z-1">
<h3 class="fw-bold mb-2 text-glow">
 <i class="bi bi-speedometer2 me-2"></i>Dashboard Nasabah
</h3>
<p class="mb-0 fs-6">
    Selamat datang kembali, <strong>Nasabah</strong>! <br>
    Selamat datang di sistem informasi Bank Sampah Kelurahan Padasukan. Perhatian Anda sangat berarti dalam membantu pengelolaan sampah dan lingkungan yang lebih baik!
  </p>
  
</div>


<!-- Decorative SVG Wave + Leaf Theme -->
<svg viewBox="0 0 1440 150" preserveAspectRatio="none" style="position: absolute; bottom: 0; left: 0; height: 80px; width: 100%; z-index: 0;">
<!-- Wave -->
<path d="M0,0 C360,100 1080,0 1440,100 L1440,150 L0,150 Z" style="fill: rgba(255, 255, 255, 0.1);"></path>

<!-- Leaf dots (environmental theme) -->
<circle cx="200" cy="50" r="8" fill="rgba(255,255,255,0.3)" />
<circle cx="220" cy="60" r="5" fill="rgba(255,255,255,0.2)" />
<path d="M1160 30 C1165 20, 1175 20, 1180 30 C1185 40, 1175 50, 1170 40 C1165 30, 1160 40, 1160 30 Z" fill="rgba(255,255,255,0.2)" />
</svg>
</div>

<!-- Optional CSS for smoother transitions and effects -->
<style>
.transition {
transition: all 0.3s ease;
}

.transition:hover {
transform: translateY(-2px);
box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.text-glow {
text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.z-1 {
z-index: 1;
}
</style>

      

    <!-- Stats Overview Section -->
<!-- Stats Overview Section -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">


  </div>
  
  <!-- Optional CSS for smoother transitions and effects -->
  <style>
    .transition {
      transition: all 0.3s ease;
    }
  
    .transition:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
  
    .z-1 {
      z-index: 1;
    }
  </style>
  

    <!-- Grid Section -->
    <div class="row g-4 mb-4">
      <!-- Timeline -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card shadow rounded-5 h-100">
          <div class="card-header text-white rounded-top-5" style="background: linear-gradient(135deg, #16d800, #439b43, #83ec96);">
            <h5><i class="bi bi-recycle me-2"></i>Edukasi Sampah</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">🌱 "Bumi bukan warisan nenek moyang, tapi titipan anak cucu."</li>
              <li class="list-group-item">♻️ "Sampahmu adalah tanggung jawabmu."</li>
              <li class="list-group-item text-success">💡 "Dengan memilah sampah, kita sedang merawat masa depan."</li>
            </ul>
          </div>
        </div>
      </div>
    

      <!-- Jadwal Penjemputan Sampah -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card shadow rounded-5 h-100">
          <div class="card-header text-white rounded-top-5" style="background: linear-gradient(135deg, #d4f5d0, #a0e6a0, #79d38a);">
            <h5><i class="bi bi-table me-2"></i>Jadwal Penjemputan Sampah</h5>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped table-sm table-hover">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Hari</th>
                  <th>Waktu</th>
                  <th>Lokasi</th>
                </tr>
              </thead>
              <tbody>
                @foreach(\App\Models\JadwalPenjemputanSampah::orderBy('tanggal', 'asc')->limit(5)->get() as $index => $jadwal)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->waktu_berakhir)->format('H:i') }}</td>
                    <td>{{ $jadwal->lokasi_penjemputan }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Laporan Sampah Bulanan -->
      <div class="col-12 col-lg-4">
        @php
        use App\Models\Pengumuman;
        $pengumumanList = Pengumuman::where('status_pengumuman', 'aktif')
                            ->orderBy('tanggal_mulai', 'desc')
                            ->take(3)
                            ->get();
        @endphp
        <div class="card shadow rounded-5 h-100">
          <div class="card-header text-white rounded-top-5" style="background: linear-gradient(135deg, #d4f5d0, #a0e6a0, #79d38a);">
            <h5><i class="bi bi-box me-2"></i>Penggumuman</h5>
          </div>
          <div class="card-body">
            <h3>Pengumuman</h3>
            <p class="text-muted">
              <i class="bi bi-arrow-up-circle"></i> Data bulan ini
            </p>
            <ul class="list-group list-group-flush mt-3">
              @forelse($pengumumanList as $pengumuman)
              <li class="list-group-item">
                <strong>{{ $pengumuman->judul_pengumuman }}</strong><br>
                <small class="text-muted">{{ $pengumuman->tanggal_mulai->format('d M Y') }}</small><br>
                <span>{{ Str::limit(strip_tags($pengumuman->isi_pengumuman), 80) }}</span>
              </li>
              @empty
              <li class="list-group-item text-muted">Belum ada pengumuman.</li>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Task List -->
    @php
    $klasifikasiList = \App\Models\KlasifikasiSampah::all();
    @endphp

    <div class="col-lg-12">
      <div class="card card-custom p-4">
        <h5><i class="bi bi-list-task me-2"></i>Edukasi Sampah</h5>
        <ul class="list-group mt-3">
          @forelse ($klasifikasiList as $klasifikasi)
          <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
              <strong>{{ $klasifikasi->jenis_sampah }}</strong>
              <span class="badge 
                @if ($klasifikasi->kategori_sampah === 'Organik') bg-success 
                @elseif ($klasifikasi->kategori_sampah === 'Anorganik') bg-info 
                @else bg-secondary 
                @endif 
                badge-custom">
                {{ $klasifikasi->kategori_sampah }}
              </span>
            </div>
            <div class="text-muted mt-1" style="font-size: 0.875rem;">
              {{ $klasifikasi->deskripsi }}
            </div>
          </li>
          @empty
          <li class="list-group-item">Belum ada data klasifikasi sampah.</li>
          @endforelse
        </ul>
      </div>
    </div>

  </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@endsection
