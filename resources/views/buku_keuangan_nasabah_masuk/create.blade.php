@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Pemasukan Nasabah</h2>

        <form action="{{ route('buku_keuangan_nasabah_masuk.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="data_nasabah_id" class="form-label">Nasabah</label>
                <select class="form-control" id="data_nasabah_id" name="data_nasabah_id" required>
                    <option value="">Pilih Nasabah</option>
                    @foreach ($nasabahs as $nasabah)
                        <option value="{{ $nasabah->id }}">{{ $nasabah->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="klasifikasi_sampah_id" class="form-label">Jenis Sampah</label>
                <select class="form-control" id="klasifikasi_sampah_id" name="klasifikasi_sampah_id" required>
                    <option value="">Pilih Jenis Sampah</option>
                    @foreach ($klasifikasiSampahs as $klasifikasi)
                        <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->jenis_sampah }} - {{ $klasifikasi->kategori_sampah }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_berat" class="form-label">Jumlah Berat (kg)</label>
                <input type="number" class="form-control" id="jumlah_berat" name="jumlah_berat" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
