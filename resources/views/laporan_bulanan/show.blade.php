@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary"><i class="fas fa-info-circle"></i> Laporan Bulanan - Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('laporan_bulanan.index') }}">Data Laporan Bulanan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card shadow-lg border-light mb-5 wow zoomIn" data-wow-duration="1.5s">
                        <div class="card-header bg-gradient-dark text-white">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Detail Laporan Bulanan</h3>
                        </div>
                        <div class="card-body bg-light rounded-lg">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="text-muted">Nama Unit:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->nama_unit }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="text-muted">Penanggung Jawab:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->ketuaRw->user->name ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="text-muted">Alamat Penanggung Jawab:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->ketuaRw->namaRw->alamat ?? '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="text-muted">RW:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->ketuaRw->namaRw->nama_rw ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="text-muted">No Telpon Penanggung Jawab:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->ketuaRw->no_telpon ?? '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="text-muted">Jenis & Kategori Sampah:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->klasifikasiSampah->jenis_sampah ?? '-' }} - {{ $laporan->klasifikasiSampah->kategori_sampah ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="text-muted">Nama Sampah:</strong>
                                    <p class="text-dark fs-5">{{ $laporan->nama_sampah }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="text-muted">Berat (kg):</strong>
                                    <p class="text-dark fs-5">{{ number_format($laporan->berat, 2) }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong class="text-muted">Harga per Kg:</strong>
                                    <p class="text-dark fs-5">Rp{{ number_format($laporan->harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong class="text-muted">Total Harga:</strong>
                                    <p class="text-dark fs-5">Rp{{ number_format($laporan->total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <strong class="text-muted">Keterangan:</strong>
                                <p class="text-dark fs-5">{{ $laporan->keterangan ?? '-' }}</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('laporan_bulanan.index') }}" class="btn btn-outline-primary wow fadeIn" data-wow-duration="1s">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button class="btn btn-success wow bounceIn" data-wow-duration="1s">
                                    <i class="fas fa-download"></i> Unduh Laporan
                                </button>
                            </div>

                            <!-- Tooltip for Laporan Section -->
                            <div class="tooltip-section mt-4">
                                <span class="text-muted">Ingin mempelajari lebih lanjut tentang sampah?</span>
                                <button class="btn btn-info btn-sm" data-toggle="tooltip" title="Klik untuk mendapatkan panduan lebih lanjut.">
                                    <i class="fas fa-info-circle"></i> Panduan Sampah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        // Enable tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
