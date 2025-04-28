@extends('adminlte.layouts.app')

@section('content')
<style>
  .content-wrapper {
    background: linear-gradient(135deg, #16d800, #439b43, #69c079);
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
            <h1 class="m-0">Daftar Pengumuman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Pengumuman</li>
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
                <h3 class="card-title">Daftar Pengumuman</h3>
                <a href="{{ route('pengumuman.create') }}" class="btn btn-primary float-right">Buat Pengumuman Baru</a>
              </div>
              <div class="card-body">
                @if(session('success'))
                  <script>
                    Swal.fire({
                      title: 'Berhasil!',
                      text: "{{ session('success') }}",
                      icon: 'success',
                      confirmButtonText: 'OK'
                    }).then(() => {
                      window.location.reload();
                    });
                  </script>
                @endif

                @if($pengumuman->count())
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pengumuman as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td><a href="{{ route('pengumuman.show', $item->id_pengumuman) }}">{{ $item->judul_pengumuman }}</a></td>
                          <td>{{ $item->tanggal_mulai }}</td>
                          <td>{{ $item->tanggal_berakhir }}</td>
                          <td>{{ $item->status_pengumuman }}</td>
                          <td>
                            <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">Hapus</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">Tidak ada pengumuman tersedia.</p>
                @endif
              </div>
            </div>
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
  </script>
@endsection
