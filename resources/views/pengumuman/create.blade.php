@extends('adminlte.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Pengumuman Baru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
              <li class="breadcrumb-item active">Buat Pengumuman</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Pengumuman</h3>
              </div>
              <div class="card-body">
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form action="{{ route('pengumuman.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="judul_pengumuman">Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="{{ old('judul_pengumuman') }}" required>
                  </div>

                  <div class="form-group">
                    <label for="isi_pengumuman">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi_pengumuman" name="isi_pengumuman" rows="5" required>{{ old('isi_pengumuman') }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_berakhir">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" required>
                  </div>

                  <div class="form-group">
                    <label for="penulis_pengumuman">Penulis Pengumuman (Opsional)</label>
                    <input type="text" class="form-control" id="penulis_pengumuman" name="penulis_pengumuman" value="{{ old('penulis_pengumuman') }}">
                  </div>

                  <div class="form-group">
                    <label for="status_pengumuman">Status Pengumuman</label>
                    <select class="form-control" id="status_pengumuman" name="status_pengumuman" required>
                      <option value="Aktif" {{ old('status_pengumuman') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                      <option value="Non Aktif" {{ old('status_pengumuman') == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-success">Simpan Pengumuman</button>
                  <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
