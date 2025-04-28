@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Rekap Sampah</h4>
    <form action="{{ route('rekap_sampah.update', $rekap->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Unit</label>
            <select name="unit_id" class="form-control">
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ $rekap->unit_id == $unit->id ? 'selected' : '' }}>
                        {{ $unit->nama_unit }} ({{ $unit->nama_rw }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Klasifikasi Sampah</label>
            <select name="klasifikasi_sampah_id" class="form-control">
                @foreach($klasifikasi as $sampah)
                    <option value="{{ $sampah->id }}" {{ $rekap->klasifikasi_sampah_id == $sampah->id ? 'selected' : '' }}>
                        {{ $sampah->jenis_sampah }} - {{ $sampah->kategori_sampah }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Sampah</label>
            <input type="text" name="nama_sampah" class="form-control" value="{{ $rekap->nama_sampah }}" required>
        </div>

        <div class="mb-3">
            <label>Volume Sampah (kg)</label>
            <input type="number" name="volume_sampah" class="form-control" step="0.01" value="{{ $rekap->volume_sampah }}" required>
        </div>

        <div class="mb-3">
            <label>Harga per Kg</label>
            <input type="number" name="harga_sampah" class="form-control" value="{{ $rekap->harga_sampah }}" required>
        </div>

        <div class="mb-3">
            <label>Dokumentasi (gambar)</label><br>
            @if ($rekap->dokumentasi)
                <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" width="120" class="mb-2">
            @endif
            <input type="file" name="dokumentasi" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $rekap->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('rekap_sampah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
