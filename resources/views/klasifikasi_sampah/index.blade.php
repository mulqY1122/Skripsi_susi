@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Klasifikasi Sampah</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('klasifikasi_sampah.create') }}" class="btn btn-primary mb-3">Tambah Klasifikasi Sampah</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Sampah</th>
                    <th>Kategori Sampah</th>
                    <th>Deskripsi</th>
                    <th>Satuan Berat (Kg)</th>
                    <th>Satuan Harga (Rp)</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $sampah)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $sampah->jenis_sampah }}</td>
                        <td>{{ $sampah->kategori_sampah }}</td>
                        <td>{{ $sampah->deskripsi }}</td>
                        <td>{{ $sampah->kg }}</td>
                        <td>{{ number_format($sampah->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('klasifikasi_sampah.show', $sampah->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('klasifikasi_sampah.edit', $sampah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection