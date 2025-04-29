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
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">
            <i class="fas fa-book text-primary"></i> Daftar Keuangan RW
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fas fa-folder-open"></i> Keuangan RW
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
              <h3 class="card-title m-0">
                <i class="fas fa-clipboard-list"></i> Daftar Keuangan RW
              </h3>
              @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
              <a href="{{ route('buku_tabungan.create') }}" 
              class="btn text-dark"
              style="background: linear-gradient(to right, #0cb900, #94c79a); border: none; font-weight: 600;">
                <i class="fas fa-plus-circle me-1"></i> Tambah Keuangan RW
              </a>
              @endif
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

              <!-- Search Input -->
              <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama nasabah...">
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped align-middle" id="bukuTabunganTable">
                  <thead class="text-white text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama Nasabah</th>
                      <th>RW</th>
                      <th>No Telepon</th>
                      <th>Jenis Kelamin</th>
                      <th>Jenis Sampah</th>
                      <th>Tanggal</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Saldo</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($bukuTabungans as $bukuTabungan)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td class="nama-nasabah">{{ $bukuTabungan->dataNasabah->user->name }}</td>
                      <td class="text-center">{{ $bukuTabungan->dataNasabah->namaRW->nama_rw }}</td>
                      <td class="text-center">{{ $bukuTabungan->dataNasabah->no_telepon }}</td>
                      <td class="text-center">
                        <span class="badge badge-{{ $bukuTabungan->dataNasabah->jenis_kelamin == 'Laki-laki' ? 'primary' : 'warning' }}">
                          {{ $bukuTabungan->dataNasabah->jenis_kelamin }}
                        </span>
                      </td>
                      <td>{{ $bukuTabungan->klasifikasiSampah->jenis_sampah }}</td>
                      <td class="text-center">{{ \Carbon\Carbon::parse($bukuTabungan->tanggal)->format('d M Y') }}</td>
                      <td class="text-right">
                        <span class="badge bg-success">+Rp{{ number_format($bukuTabungan->debit, 0, ',', '.') }}</span>
                      </td>
                      <td class="text-right">
                        <span class="badge bg-danger">-Rp{{ number_format($bukuTabungan->kredit, 0, ',', '.') }}</span>
                      </td>
                      <td class="text-right">
                        <strong>Rp{{ number_format($bukuTabungan->saldo, 0, ',', '.') }}</strong>
                      </td>
                      <td class="text-center" style="font-size: 0.8rem;">
                        <a href="{{ route('buku_tabungan.show', $bukuTabungan->id) }}" title="Lihat Data"><i class="fas fa-eye"></i></a>
                        @if(in_array(auth()->user()->role_name, ['Super Admin', 'Admin']))
                        <a href="{{ route('buku_tabungan.edit', $bukuTabungan->id) }}" title="Edit Data"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('buku_tabungan.destroy', $bukuTabungan->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus Data">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                        @endif
                        <a href="{{ route('buku_tabungan.export_pdf', $bukuTabungan->id) }}" title="Export to PDF">
                          <i class="fas fa-file-pdf"></i> 
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div id="pagination" class="mt-4 text-center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("bukuTabunganTable");
    const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keyup", function () {
      const filter = searchInput.value.toLowerCase();
      for (let i = 0; i < rows.length; i++) {
        const nama = rows[i].querySelector(".nama-nasabah").textContent.toLowerCase();
        rows[i].style.display = nama.includes(filter) ? "" : "none";
      }
    });

    // Pagination (optional, bisa dihapus kalau pakai Laravel pagination)
    let currentPage = 1;
    let rowsPerPage = 5;
    let pagination = document.getElementById("pagination");

    function showPage(page) {
      let start = (page - 1) * rowsPerPage;
      let end = start + rowsPerPage;
      for (let i = 0; i < rows.length; i++) {
        rows[i].style.display = (i >= start && i < end) ? "table-row" : "none";
      }
    }

    function setupPagination() {
      pagination.innerHTML = "";
      let pageCount = Math.ceil(rows.length / rowsPerPage);
      for (let i = 1; i <= pageCount; i++) {
        let btn = document.createElement("button");
        btn.innerText = i;
        btn.className = "btn btn-sm btn-outline-primary mx-1";
        btn.onclick = function () {
          currentPage = i;
          showPage(i);
        };
        pagination.appendChild(btn);
      }
    }

    showPage(1);
    setupPagination();
  });
</script>
@endsection
