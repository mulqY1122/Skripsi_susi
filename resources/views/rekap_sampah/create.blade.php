@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Rekap Sampah</h4>
    <form action="{{ route('rekap_sampah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Unit</label>
            <select name="unit_id" class="form-control">
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama_unit }} ({{ $unit->nama_rw }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label>Klasifikasi Sampah</label>
            <select name="klasifikasi_sampah_id" class="form-control">
                @foreach($klasifikasi as $sampah)
                    <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }} - {{ $sampah->kategori_sampah }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Sampah</label>
            <input type="text" name="nama_sampah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Volume Sampah (kg)</label>
            <input type="number" name="volume_sampah" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label>Harga per Kg</label>
            <input type="number" name="harga_sampah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Dokumentasi (gambar)</label>
            <input type="file" name="dokumentasi" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('rekap_sampah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
