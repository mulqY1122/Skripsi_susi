@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Unit: {{ $unit->nama_unit }}</h1>

        <p><strong>Admin:</strong> {{ $unit->user->name }} ({{ $unit->user->email }})</p>
        <p><strong>Nama RW:</strong> {{ $unit->nama_rw }}</p>
        <p><strong>Nama Unit Bank Sampah:</strong> {{ $unit->nama_unit_bank_sampah }}</p>
        <p><strong>Penanggung Jawab:</strong> {{ $unit->penanggung_jawab }}</p>
        <p><strong>No WhatsApp:</strong> {{ $unit->no_wa }}</p>
        <p><strong>Alamat:</strong> {{ $unit->alamat }}</p>
        <p><strong>Jumlah Nasabah:</strong> {{ $unit->jumlah_nasabah }}</p>

        <a href="{{ route('units.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
    </div>
@endsection
