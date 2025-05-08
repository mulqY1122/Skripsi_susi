@extends('adminlte.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Pengguna Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('registrasi.index') }}">Daftar Pengguna</a></li>
              <li class="breadcrumb-item active">Buat Pengguna Baru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Card for create user form -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Informasi Pengguna Baru</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('registrasi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name">Nama:</label>
                  <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="password">Kata Sandi:</label>
                  <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="role_name">Role:</label>
                  <select id="role_name" name="role_name" class="form-control" required>
                    @if(auth()->user()->role_name === 'Super Admin')
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Petugas RW (Admin)</option>
                        <option value="User">Users</option>
                    @elseif(auth()->user()->role_name === 'Admin')
                        <option value="User">Users</option>
                    @endif
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama_rw_id">Nama RW:</label>
                  <select id="nama_rw_id" name="nama_rw_id" class="form-control" required>
                    <option value="">-- Pilih Nama RW --</option>
                    @foreach($namaRws as $rw)
                      <option value="{{ $rw->id }}">{{ $rw->nama_rw }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Buat Pengguna</button>
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
