@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Klasifikasi Sampah</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('klasifikasi_sampah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_sampah">Jenis Sampah</label>
                <input type="text" name="jenis_sampah" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kategori_sampah">Kategori Sampah</label>
                <input type="text" name="kategori_sampah" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('klasifikasi_sampah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection