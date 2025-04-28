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
            <h1 class="m-0">Daftar FAQ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">FAQ</li>
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
                <h3 class="card-title">Daftar FAQ</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
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
                
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Pengirim</th>
                      <th>Email</th>
                      <th>Tujuan</th>
                      <th>Pesan</th>
                      <th>Jawaban</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($faqs as $faq)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->name }}</td>
                        <td>{{ $faq->email }}</td>
                        <td>{{ $faq->subject }}</td>
                        <td>{{ $faq->message }}</td>
                        <td>{{ $faq->answer ?? 'Belum ada jawaban' }}</td>
                        <td>
                          <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm">Respon</a>
                          <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
