@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Unit Baru</h1>

        <form action="{{ route('units.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_unit">Nama Unit</label>
                <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="{{ old('nama_unit') }}" required>
            </div>

            <div class="form-group">
                <label for="user_id">Admin</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama_rw">Nama RW</label>
                <input type="text" class="form-control" id="nama_rw" name="nama_rw" value="{{ old('nama_rw') }}" required>
            </div>

            <div class="form-group">
                <label for="nama_unit_bank_sampah">Nama Unit Bank Sampah</label>
                <input type="text" class="form-control" id="nama_unit_bank_sampah" name="nama_unit_bank_sampah" value="{{ old('nama_unit_bank_sampah') }}" required>
            </div>

            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" required>
            </div>

            <div class="form-group">
                <label for="no_wa">No WhatsApp</label>
                <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="jumlah_nasabah">Jumlah Nasabah</label>
                <input type="number" class="form-control" id="jumlah_nasabah" name="jumlah_nasabah" value="{{ old('jumlah_nasabah') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
