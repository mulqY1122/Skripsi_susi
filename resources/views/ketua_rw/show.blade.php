@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Ketua RW</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $data->user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $data->user->email }}</td>
        </tr>
        <tr>
            <th>RW</th>
            <td>{{ $data->namaRw->nama_rw }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->namaRw->alamat }}</td>
        </tr>
        <tr>
            <th>No Telpon</th>
            <td>{{ $data->no_telpon }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ ucfirst($data->jenis_kelamin) }}</td>
        </tr>
    </table>
    <a href="{{ route('ketua-rw.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
