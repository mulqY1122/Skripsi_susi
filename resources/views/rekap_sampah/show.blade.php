@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Rekap Sampah</h4>
    <div class="card">
        <div class="card-body">
            <p><strong>Nama Unit:</strong> {{ $rekap->unit->nama_unit }}</p>
            <p><strong>RW:</strong> {{ $rekap->unit->nama_rw }}</p>
            <p><strong>Nama Unit Bank Sampah:</strong> {{ $rekap->unit->nama_unit_bank_sampah }}</p>
            <p><strong>Jumlah Nasabah:</strong> {{ $rekap->unit->jumlah_nasabah }}</p>
            <hr>
            <p><strong>Jenis Sampah:</strong> {{ $rekap->klasifikasiSampah->jenis_sampah }}</p>
            <p><strong>Kategori Sampah:</strong> {{ $rekap->klasifikasiSampah->kategori_sampah }}</p>
            <p><strong>Nama Sampah:</strong> {{ $rekap->nama_sampah }}</p>
            <p><strong>Volume:</strong> {{ $rekap->volume_sampah }} kg</p>
            <p><strong>Harga per Kg:</strong> Rp{{ number_format($rekap->harga_sampah, 0, ',', '.') }}</p>
            <p><strong>Total Harga:</strong> Rp{{ number_format($rekap->total_harga, 0, ',', '.') }}</p>
            <p><strong>Keterangan:</strong> {{ $rekap->keterangan ?? '-' }}</p>

            @if ($rekap->dokumentasi)
                <p><strong>Dokumentasi:</strong></p>
                <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" width="300" class="img-thumbnail">
            @endif
        </div>
    </div>
    <a href="{{ route('rekap_sampah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
