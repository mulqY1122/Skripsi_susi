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
          <h1 class="m-0">Daftar Data Nasabah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Nasabah</li>
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
              <h3 class="card-title">Data Nasabah</h3>
              <div class="card-tools">
                <a href="{{ route('data_nasabah.create') }}" class="btn btn-primary">+ Tambah Data Nasabah</a>
              </div>
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

              <input type="text" id="search" placeholder="Cari Nasabah" class="form-control mb-3">

              <table id="nasabahTable" class="table table-bordered table-striped">
                <thead class="bg-primary text-white">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>RW</th>
                    <th>No Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto Profil</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataNasabah as $index => $nasabah)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $nasabah->user->name }}</td>
                    <td>{{ $nasabah->namaRw->nama_rw }}</td>
                    <td>{{ $nasabah->no_telepon }}</td>
                    <td>{{ ucfirst($nasabah->jenis_kelamin) }}</td>
                    <td>
                      @if($nasabah->foto_profil)
                        <img src="{{ asset('storage/'.$nasabah->foto_profil) }}" alt="Foto Profil" width="50" height="50">
                      @else
                        <span>--</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('data_nasabah.show', $nasabah->id) }}" class="btn btn-info btn-sm">Detail</a>
                      <button class="btn btn-warning btn-sm" onclick="confirmEdit('{{ route('data_nasabah.edit', $nasabah->id) }}')">Edit</button>
                      <form action="{{ route('data_nasabah.destroy', $nasabah->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <div id="pagination" class="mt-3 text-center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let table = document.getElementById("nasabahTable");
    let searchInput = document.getElementById("search");
    let rows = table.getElementsByTagName("tr");
    let currentPage = 1;
    let rowsPerPage = 5;
    let pagination = document.getElementById("pagination");

    function showPage(page) {
      let start = (page - 1) * rowsPerPage + 1;
      let end = start + rowsPerPage;
      for (let i = 1; i < rows.length; i++) {
        rows[i].style.display = (i >= start && i < end) ? "table-row" : "none";
      }
    }

    function setupPagination() {
      pagination.innerHTML = "";
      let pageCount = Math.ceil((rows.length - 1) / rowsPerPage);
      for (let i = 1; i <= pageCount; i++) {
        let btn = document.createElement("button");
        btn.innerText = i;
        btn.className = "btn btn-sm btn-secondary mx-1";
        btn.onclick = function () {
          currentPage = i;
          showPage(i);
        };
        pagination.appendChild(btn);
      }
    }

    searchInput.addEventListener("keyup", function () {
      let filter = searchInput.value.toLowerCase();
      for (let i = 1; i < rows.length; i++) {
        let text = rows[i].textContent.toLowerCase();
        rows[i].style.display = text.includes(filter) ? "table-row" : "none";
      }
    });

    showPage(1);
    setupPagination();
  });

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
      title: 'Edit Data',
      text: "Anda akan diarahkan ke halaman edit.",
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Lanjutkan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  }
</script>
@endsection
