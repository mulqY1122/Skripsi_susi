@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Ketua RW</h3>
    <form action="{{ route('ketua-rw.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama User (Admin)</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama RW</label>
            <select name="nama_rw_id" class="form-control">
                @foreach($namaRwList as $rw)
                    <option value="{{ $rw->id }}">{{ $rw->nama_rw }} - {{ $rw->alamat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>No Telpon</label>
            <input type="text" name="no_telpon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
