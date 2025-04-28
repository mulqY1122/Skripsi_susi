@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Klasifikasi Sampah</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jenis Sampah: {{ $klasifikasiSampah->jenis_sampah }}</h5>
                <p class="card-text">Kategori Sampah: {{ $klasifikasiSampah->kategori_sampah }}</p>
                <p class="card-text">Deskripsi: {{ $klasifikasiSampah->deskripsi }}</p>
                <p class="card-text">Satuan Berat: {{ $klasifikasiSampah->kg }} Kg</p>
                <p class="card-text">Satuan Harga: Rp {{ number_format($klasifikasiSampah->harga, 0, ',', '.') }}</p>
            </div>
        </div>
        
        <a href="{{ route('klasifikasi_sampah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection