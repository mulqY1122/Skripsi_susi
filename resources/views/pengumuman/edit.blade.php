@extends('adminlte.layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Pengumuman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Edit Pengumuman</h3>
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
                
                <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="POST">
                  @csrf
                  @method('PUT')
                  
                  <div class="form-group">
                    <label for="judul_pengumuman" class="font-weight-bold">Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="{{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="isi_pengumuman" class="font-weight-bold">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi_pengumuman" name="isi_pengumuman" rows="5" required>{{ old('isi_pengumuman', $pengumuman->isi_pengumuman) }}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $pengumuman->tanggal_mulai) }}" required>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_berakhir" class="font-weight-bold">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $pengumuman->tanggal_berakhir) }}" required>
                  </div>

                  <div class="form-group">
                    <label for="penulis_pengumuman" class="font-weight-bold">Penulis Pengumuman (Opsional)</label>
                    <input type="text" class="form-control" id="penulis_pengumuman" name="penulis_pengumuman" value="{{ old('penulis_pengumuman', $pengumuman->penulis_pengumuman) }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="status_pengumuman" class="font-weight-bold">Status Pengumuman</label>
                    <select class="form-control" id="status_pengumuman" name="status_pengumuman" required>
                      <option value="Aktif" {{ old('status_pengumuman', $pengumuman->status_pengumuman) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                      <option value="Non Aktif" {{ old('status_pengumuman', $pengumuman->status_pengumuman) == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                    </select>
                  </div>
                  
                  <div class="d-flex justify-content-between">
                    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success" onclick="confirmUpdate(event)">Update Pengumuman</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmUpdate(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin memperbarui pengumuman?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          event.target.closest('form').submit();
        }
      });
    }
  </script>
@endsection