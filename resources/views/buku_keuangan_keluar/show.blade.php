@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Buku Keuangan Nasabah Keluar</h1>

    <div class="mb-3">
        <strong>Nasabah:</strong> {{ $bukuKeuanganNasabahKeluar->dataNasabah->name }}
    </div>

    <div class="mb-3">
        <strong>Klasifikasi Sampah:</strong> {{ $bukuKeuanganNasabahKeluar->klasifikasiSampah->nama }}
    </div>

    <div class="mb-3">
        <strong>Jumlah Berat:</strong> {{ number_format($bukuKeuanganNasabahKeluar->jumlah_berat, 2) }}
    </div>

    <div class="mb-3">
        <strong>Jumlah Keluar:</strong> {{ number_format($bukuKeuanganNasabahKeluar->jumlah_keluar, 2) }}
    </div>

    <div class="mb-3">
        <strong>Tanggal Keluar:</strong> {{ $bukuKeuanganNasabahKeluar->tanggal_keluar->format('d-m-Y') }}
    </div>

    <div class="mb-3">
        <strong>Keterangan:</strong> {{ $bukuKeuanganNasabahKeluar->keterangan }}
    </div>

    <a href="{{ route('buku-keuangan-nasabah-keluar.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
</div>
@endsection
