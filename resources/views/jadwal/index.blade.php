@extends('adminlte.layouts.app')

@section('content')
<style>
  .content-wrapper {
    background: linear-gradient(135deg, #ffffff, #439b43, #a9f0b6);
    min-height: 100vh;
    padding-top: 20px;
  }

  .card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
  }

  .card-header {
    background: linear-gradient(135deg, #16d800, #439b43, #69c079);
    color: white !important;
  }

  .table thead {
    background: linear-gradient(135deg, #16d800, #439b43, #69c079);
    color: white;
  }

  .btn-outline-primary {
    border-color: #16d800;
    color: #16d800;
  }

  .btn-outline-primary:hover {
    background-color: #16d800;
    color: white;
  }

  .breadcrumb-item.active {
    color: #fff;
    background: linear-gradient(135deg, #16d800, #439b43, #69c079);
    padding: 5px 10px;
    border-radius: 8px;
  }
</style>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Jadwal Penjemputan Sampah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Jadwal Penjemputan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title">Jadwal Penjemputan</h3>
          @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
          <a href="{{ route('jadwal.create') }}" class="btn btn-primary">+ Tambah Jadwal</a>
            @endauth
        </div>

        <div class="card-body">
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

          @php
            $groupedJadwals = $jadwals->groupBy('hari');
          @endphp

          @foreach($groupedJadwals as $hari => $items)
            <h5 class="mt-4">{{ $hari }}</h5>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Berakhir</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $index => $jadwal)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->waktu_mulai }}</td>
                    <td>{{ $jadwal->waktu_berakhir }}</td>
                    <td>{{ $jadwal->lokasi_penjemputan }}</td>
                    <td>
                      <a href="{{ route('jadwal.show', $jadwal->id) }}" class="btn btn-info btn-sm">Lihat</a>
                      @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
                      <button class="btn btn-warning btn-sm" onclick="confirmEdit('{{ route('jadwal.edit', $jadwal->id) }}')">Edit</button>
                      <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">Hapus</button>
                      </form>
                      @endauth
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete(form) {
    Swal.fire({
      title: 'Anda yakin?',
      text: "Data ini akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  }

  function confirmEdit(url) {
    Swal.fire({
      title: 'Edit Jadwal?',
      text: "Anda akan diarahkan ke halaman edit.",
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Ya, lanjutkan!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  }
</script>
@endsection
