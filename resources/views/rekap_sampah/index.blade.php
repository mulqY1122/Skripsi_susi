@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Data Rekap Sampah</h4>
    <a href="{{ route('rekap_sampah.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Unit</th>
                <th>RW</th>
                <th>Jenis Sampah</th>
                <th>Kategori</th>
                <th>Nama Sampah</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
                <th>Dokumentasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekap as $item)
            <tr>
                <td>{{ $item->unit->nama_unit }}</td>
                <td>{{ $item->unit->nama_rw }}</td>
                <td>{{ $item->klasifikasiSampah->jenis_sampah }}</td>
                <td>{{ $item->klasifikasiSampah->kategori_sampah }}</td>
                <td>{{ $item->nama_sampah }}</td>
                <td>{{ $item->volume_sampah }} kg</td>
                <td>Rp{{ number_format($item->harga_sampah, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
                <td>
                    @if($item->dokumentasi)
                        <img src="{{ asset('storage/' . $item->dokumentasi) }}" alt="Dokumentasi" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('rekap_sampah.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('rekap_sampah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rekap_sampah.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
