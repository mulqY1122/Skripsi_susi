@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail RW</h1>

    <div class="card">
        <div class="card-header">
            {{ $rw->nama_rw }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Deskripsi</h5>
            <p class="card-text">{{ $rw->deskripsi ?? 'Tidak ada deskripsi' }}</p>
            <h5 class="card-title">Alamat</h5>
            <p class="card-text">{{ $rw->alamat ?? 'Tidak ada alamat' }}</p>
        </div>
    </div>

    <a href="{{ route('nama_rw.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
