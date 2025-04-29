@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Buku Keuangan Nasabah Keluar</h1>

    <form action="{{ route('buku-keuangan-nasabah-keluar.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="buku_keuangan_nasabah_masuk_id">ID Masuk</label>
            <input type="text" class="form-control" id="buku_keuangan_nasabah_masuk_id" name="buku_keuangan_nasabah_masuk_id" value="{{ $bukuKeuanganNasabahMasuk->id }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_berat">Jumlah Berat</label>
            <input type="number" step="0.01" class="form-control" id="jumlah_berat" name="jumlah_berat" required>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_keluar">Jumlah Keluar</label>
            <input type="number" step="0.01" class="form-control" id="jumlah_keluar" name="jumlah_keluar" required>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
        </div>

        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
