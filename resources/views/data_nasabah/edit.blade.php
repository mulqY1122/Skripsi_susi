@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Nasabah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('data_nasabah.index') }}">Daftar Nasabah</a></li>
            <li class="breadcrumb-item active">Edit Data Nasabah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Formulir Edit Data Nasabah</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('data_nasabah.update', $dataNasabah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="user_id">User:</label>
                  <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}" {{ $user->id == $dataNasabah->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama_rw_id">Nama RW:</label>
                  <select name="nama_rw_id" id="nama_rw_id" class="form-control" required>
                    @foreach($namaRws as $rw)
                      <option value="{{ $rw->id }}" {{ $rw->id == $dataNasabah->nama_rw_id ? 'selected' : '' }}>
                        {{ $rw->nama_rw }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="no_telepon">No Telepon:</label>
                  <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $dataNasabah->no_telepon }}">
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin:</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="laki-laki" {{ $dataNasabah->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ $dataNasabah->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="foto_profil">Foto Profil:</label>
                  <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                  @if($dataNasabah->foto_profil)
                    <br>
                    <img src="{{ asset('storage/'.$dataNasabah->foto_profil) }}" alt="Foto Profil" width="50" height="50">
                  @endif
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
