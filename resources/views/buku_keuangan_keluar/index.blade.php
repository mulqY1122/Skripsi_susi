@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Buku Keuangan Nasabah Keluar</h1>

    <!-- Tabel Buku Keuangan Nasabah Keluar -->
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukuKeuanganNasabahKeluar as $item)
                <tr>
                    <td>{{ $item->bukuKeuanganMasuk->nomor_masuk }}</td>
                    <td>{{ $item->jumlah_keluar }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>
                        <!-- Tombol untuk menambah data Buku Keuangan Nasabah Keluar -->
                        <a href="{{ route('buku-keuangan-nasabah-keluar.create', ['id_masuk' => $item->buku_keuangan_nasabah_masuk_id]) }}" class="btn btn-success btn-sm rounded-pill">
                            <i class="fas fa-plus"></i> Tambah Data Keluar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $bukuKeuanganNasabahKeluar->links() }}
</div>
@endsection
