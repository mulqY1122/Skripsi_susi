@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah RW</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('nama_rw.index') }}">Daftar RW</a></li>
            <li class="breadcrumb-item active">Tambah RW</li>
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
              <h3 class="card-title">Form Tambah RW</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('nama_rw.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama_rw">Nama RW</label>
                  <input type="text" class="form-control @error('nama_rw') is-invalid @enderror" id="nama_rw" name="nama_rw" value="{{ old('nama_rw') }}">
                  @error('nama_rw')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('nama_rw.index') }}" class="btn btn-secondary">Kembali</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@if(session('success'))
  <script>
    Swal.fire({
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      icon: 'success',
      confirmButtonText: 'OK'
    });
  </script>
@endif
@endsection
