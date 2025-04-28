@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('registrasi.index') }}">Daftar Pengguna</a></li>
              <li class="breadcrumb-item active">Edit Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Card for edit user form -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Informasi Pengguna</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('registrasi.update', $registrasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="name">Nama:</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{ $registrasi->name }}" required>
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" class="form-control" value="{{ $registrasi->email }}" required>
                </div>

                <div class="form-group">
                  <label for="password">Kata Sandi:</label>
                  <input type="password" id="password" name="password" class="form-control">
                  <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah kata sandi.</small>
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                  <label for="role_name">Role:</label>
                  <select id="role_name" name="role_name" class="form-control" required>
                      <option value="Super Admin" {{ $registrasi->role_name === 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                      <option value="Admin" {{ $registrasi->role_name === 'Admin' ? 'selected' : '' }}>Petugas RW</option>
                      <option value="User" {{ $registrasi->role_name === 'User' ? 'selected' : '' }}>Users</option>
                  </select>
              </div>
              

                <button type="submit" class="btn btn-primary">Perbarui Pengguna</button>
                <a href="{{ route('registrasi.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
