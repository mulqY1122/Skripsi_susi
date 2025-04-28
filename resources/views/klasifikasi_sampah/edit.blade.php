@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Klasifikasi Sampah</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('klasifikasi_sampah.update', $klasifikasiSampah->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="jenis_sampah">Jenis Sampah</label>
                <input type="text" name="jenis_sampah" class="form-control" value="{{ $klasifikasiSampah->jenis_sampah }}" required>
            </div>
        
            <div class="form-group">
                <label for="kategori_sampah">Kategori Sampah</label>
                <input type="text" name="kategori_sampah" class="form-control" value="{{ $klasifikasiSampah->kategori_sampah }}" required>
            </div>
        
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $klasifikasiSampah->deskripsi }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="kg">Berat (Kg)</label>
                <input type="number" name="kg" class="form-control" min="0" step="0.01" value="{{ $klasifikasiSampah->kg }}">
            </div>
        
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" min="0" step="1" value="{{ $klasifikasiSampah->harga }}">
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('klasifikasi_sampah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
        
    </div>
@endsection