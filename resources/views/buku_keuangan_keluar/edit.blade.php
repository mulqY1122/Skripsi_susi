@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Buku Keuangan Nasabah Keluar</h1>

    <form action="{{ route('buku-keuangan-nasabah-keluar.update', $bukuKeuanganNasabahKeluar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="jumlah_berat">Jumlah Berat</label>
            <input type="number" step="0.01" class="form-control" id="jumlah_berat" name="jumlah_berat" value="{{ $bukuKeuanganNasabahKeluar->jumlah_berat }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_keluar">Jumlah Keluar</label>
            <input type="number" step="0.01" class="form-control" id="jumlah_keluar" name="jumlah_keluar" value="{{ $bukuKeuanganNasabahKeluar->jumlah_keluar }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="{{ $bukuKeuanganNasabahKeluar->tanggal_keluar->format('Y-m-d') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $bukuKeuanganNasabahKeluar->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
