@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow rounded-3 border-0">
                <div class="card-header bg-gradient bg-success text-white d-flex justify-content-between align-items-center py-3 px-4">
                    <h4 class="mb-0"><i class="fas fa-calendar-check me-2"></i> Detail Jadwal Penjemputan</h4>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-light btn-sm shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="mb-4">
                        <h6 class="text-muted">Tanggal Penjemputan</h6>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-day text-primary me-2 fs-5"></i>
                            <span class="fs-5">{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted">Hari</h6>
                        <span class="badge bg-info text-dark fs-6 px-3 py-2">
                            <i class="fas fa-sun me-1"></i> {{ $jadwal->hari }}
                        </span>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Waktu Mulai</h6>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-success me-2 fs-5"></i>
                                <span class="fs-6">{{ $jadwal->waktu_mulai }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Waktu Berakhir</h6>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-hourglass-end text-danger me-2 fs-5"></i>
                                <span class="fs-6">{{ $jadwal->waktu_berakhir }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted">Lokasi Penjemputan</h6>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-danger me-2 fs-5"></i>
                            <span class="fs-6">{{ $jadwal->lokasi_penjemputan }}</span>
                        </div>
                    </div>

                    {{-- Optional: Tampilkan Google Maps jika lokasi berupa alamat --}}
                    @php
                        $lokasiEncoded = urlencode($jadwal->lokasi_penjemputan);
                    @endphp
                    <div class="mt-4">
                        <iframe
                            src="https://www.google.com/maps?q={{ $lokasiEncoded }}&output=embed"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            class="rounded-3 shadow-sm">
                        </iframe>
                    </div>
                </div>

                
            </div>

        </div>
    </div>
</div>
@endsection
