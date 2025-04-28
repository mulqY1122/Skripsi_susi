@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Nasabah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('data_nasabah.index') }}">Daftar Nasabah</a></li>
            <li class="breadcrumb-item active">Tambah Data Nasabah</li>
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
              <h3 class="card-title">Formulir Tambah Data Nasabah</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('data_nasabah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="user_id">User:</label>
                  <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama_rw_id">Nama RW:</label>
                  <select name="nama_rw_id" id="nama_rw_id" class="form-control" required>
                    @foreach($namaRws as $rw)
                      <option value="{{ $rw->id }}">{{ $rw->nama_rw }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="no_telepon">No Telepon:</label>
                  <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin:</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="foto_profil">Foto Profil:</label>
                  <input type="file" name="foto_profil" id="foto_profil" class="form-control">
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
