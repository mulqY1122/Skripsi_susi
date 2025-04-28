@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Ketua RW</h3>
    <form action="{{ route('ketua-rw.update', $data->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama User (Admin)</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $data->user_id ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama RW</label>
            <select name="nama_rw_id" class="form-control">
                @foreach($namaRwList as $rw)
                    <option value="{{ $rw->id }}" {{ $rw->id == $data->nama_rw_id ? 'selected' : '' }}>
                        {{ $rw->nama_rw }} - {{ $rw->alamat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>No Telpon</label>
            <input type="text" name="no_telpon" class="form-control" value="{{ $data->no_telpon }}">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="laki-laki" {{ $data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
