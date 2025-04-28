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
                    <th>Harga Jual (Rp)</th>
                    <th>Harga Beli (Rp)</th>
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
                        <td>{{ number_format($sampah->harga_jual, 0, ',', '.') }}</td> <!-- Harga Jual -->
                        <td>{{ number_format($sampah->harga_beli, 0, ',', '.') }}</td> <!-- Harga Beli -->
                        <td>
                            <a href="{{ route('klasifikasi_sampah.show', $sampah->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('klasifikasi_sampah.edit', $sampah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Tambahkan aksi Hapus jika diperlukan -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
    </div>
@endsection