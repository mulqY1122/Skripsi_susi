@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="p-4 mb-4 d-flex justify-content-between align-items-center rounded shadow-sm"
           style="background: linear-gradient(135deg, #e8f5e9, #ffffff, #f0f0f0); border: 1px solid #dcdcdc;">
        <div>
          <h3 class="fw-bold mb-0 text-dark">
            <i class="bi bi-speedometer2 me-2 text-success"></i> Dashboard Overview
          </h3>
          <small class="text-secondary">Welcome back! Here's what’s happening with your projects today.</small>
        </div>
        <button class="btn btn-light text-success shadow-sm fw-bold">
          <i class="bi bi-plus-circle me-1"></i> Create New
        </button>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @php
      $kategoriCounts = \App\Models\KlasifikasiSampah::selectRaw('kategori_sampah, COUNT(*) as total')
          ->groupBy('kategori_sampah')
          ->get();

      $labels = $kategoriCounts->pluck('kategori_sampah');
      $data = $kategoriCounts->pluck('total');
      @endphp

      <div class="row g-4 mb-4">
        @foreach ($kategoriCounts as $kategori)
        <div class="col-md-4">
          <div class="card card-custom p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div>
                <h6 class="text-secondary">{{ $kategori->kategori_sampah }}</h6>
                <h3 class="text-primary">{{ $kategori->total }} Jenis</h3>
                <p class="text-muted mb-0">Data Sampah Terklasifikasi</p>
              </div>
              <i class="bi bi-recycle display-6 text-muted"></i>
            </div>
            <div class="progress mt-3" style="height: 6px;">
              <div class="progress-bar bg-primary" style="width: {{ $kategori->total * 10 }}%;"></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="card card-custom p-4 mb-4">
        <h5 class="mb-3"><i class="bi bi-bar-chart-line me-2"></i>Perbandingan Kategori Sampah</h5>
        <canvas id="chartKategoriSampah" height="100"></canvas>
      </div>

      <div class="row g-4">
        @php
        use App\Models\Pengumuman;
        $pengumumanList = Pengumuman::where('status_pengumuman', 'aktif')
                            ->orderBy('tanggal_mulai', 'desc')
                            ->take(3)
                            ->get();
        @endphp

        <div class="col-lg-4">
          <div class="card card-custom p-4 h-100">
            <h5><i class="bi bi-clock-history me-2"></i>Pengumuman</h5>
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

        @php
        use App\Models\LaporanBulanan;
        $laporanSampah = LaporanBulanan::orderBy('created_at', 'desc')->take(4)->get();
        @endphp

        <div class="col-lg-4">
          <div class="card card-custom p-4 h-100">
            <h5><i class="bi bi-table me-2"></i>Jumlah Sampah</h5>
            <div class="table-responsive mt-3">
              <table class="table table-striped table-sm">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Unit</th>
                    <th>Sampah</th>
                    <th>Berat</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($laporanSampah as $index => $laporan)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->nama_unit }}</td>
                    <td>{{ $laporan->nama_sampah }}</td>
                    <td>{{ number_format($laporan->berat, 2) }} Kg</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada data.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        @php
        use App\Models\Faq;
        use Illuminate\Support\Facades\Auth;
        $faqs = Faq::where('user_id', Auth::id())->latest()->get();
        @endphp

        <div class="col-lg-4">
          <div class="card card-custom p-4 h-100">
            <h5><i class="bi bi-chat-dots me-2"></i>Chat Box</h5>
            <div class="chat-box mt-3" style="max-height: 200px; overflow-y: auto;">
              @forelse ($faqs as $faq)
              <div class="d-flex align-items-start mb-3">
                <img src="https://i.pravatar.cc/40?u={{ $faq->email }}" class="avatar rounded-circle me-2">
                <div class="chat-message bg-light p-2 rounded w-100">
                  <strong>{{ $faq->subject }}</strong><br>
                  <small class="text-muted">{{ $faq->message }}</small>
                  @if ($faq->answer)
                  <div class="mt-2 p-2 bg-success text-white rounded">
                    <strong>Jawaban:</strong> {{ $faq->answer }}
                  </div>
                  @endif
                </div>
              </div>
              @empty
              <p class="text-muted">Belum ada pertanyaan.</p>
              @endforelse
            </div>
          </div>
        </div>

        @php
        $klasifikasiList = \App\Models\KlasifikasiSampah::all();
        @endphp

        <div class="col-lg-12">
          <div class="card card-custom p-4">
            <h5><i class="bi bi-list-task me-2"></i>Daftar Klasifikasi Sampah</h5>
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
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartKategoriSampah').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($labels) !!},
      datasets: [{
        label: 'Jumlah Sampah',
        data: {!! json_encode($data) !!},
        backgroundColor: '#198754',
        borderRadius: 10
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>

@push('styles')
<style>
  .card-custom {
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease-in-out;
  }
  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
  }
  .avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
  }
</style>
@endpush
@endsection
