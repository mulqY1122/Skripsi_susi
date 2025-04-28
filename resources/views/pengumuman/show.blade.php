<!-- resources/views/pengumuman/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $pengumuman->judul_pengumuman }}</h1>

    <p><strong>Tanggal Mulai:</strong> {{ $pengumuman->tanggal_mulai }}</p>
    <p><strong>Tanggal Berakhir:</strong> {{ $pengumuman->tanggal_berakhir }}</p>
    <p><strong>Status:</strong> {{ $pengumuman->status_pengumuman }}</p>
    <p><strong>Isi Pengumuman:</strong></p>
    <p>{{ $pengumuman->isi_pengumuman }}</p>

    <a href="{{ route('pengumuman.edit', $pengumuman->id_pengumuman) }}" class="btn btn-secondary">Edit</a>
    <form action="{{ route('pengumuman.destroy', $pengumuman->id_pengumuman) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>

    <a href="{{ route('pengumuman.index') }}" class="btn btn-primary">Kembali</a>
@endsection