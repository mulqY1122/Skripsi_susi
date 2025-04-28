@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Unit</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('units.create') }}" class="btn btn-primary mb-3">Tambah Unit</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>RW</th>
                    <th>Nama Unit</th>
                    <th>Admin</th>
                    <th>Penanggung Jawab</th>
                    <th>Jumlah Nasabah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $key => $unit)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $unit->nama_rw }}</td>
                        <td>{{ $unit->nama_unit }}</td>
                        <td>{{ $unit->user->name }} ({{ $unit->user->email }})</td>
                        <td>{{ $unit->penanggung_jawab }}</td>
                        <td>{{ $unit->jumlah_nasabah }}</td>
                        <td>
                            <a href="{{ route('units.show', $unit->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
