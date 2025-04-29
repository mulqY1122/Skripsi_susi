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
            <i class="fas fa-book text-primary"></i> Daftar Pemasukan Nasabah
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fas fa-folder-open"></i> Daftar Pemasukan Nasabah
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
                <i class="fas fa-clipboard-list"></i> Daftar Pemasukan Nasabah
              </h3>
              <a href="{{ route('buku_keuangan_nasabah_masuk.create') }}" class="btn text-dark" style="background: linear-gradient(to right, #0cb900, #94c79a); border: none; font-weight: 600;">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pemasukan
              </a>
            </div>

            <div class="card-body">
              <!-- Search Input -->
              <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama nasabah...">
              </div>

              <!-- Table -->
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped align-middle" id="pemasukanTable">
                  <thead class="text-white text-center">
                    <tr>
                      <th>No</th>
                      <th>Tanggal Masuk</th>
                      <th>Nama Nasabah</th>
                      <th>Nama RW</th>
                      <th>No Telepon</th>
                      <th>Jenis Sampah</th>
                      <th>Kategori Sampah</th>
                      <th>Harga Per Kg</th>
                      <th>Jumlah Berat</th>
                      <th>Jumlah Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pemasukan as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->tanggal_masuk }}</td>
                      <td>{{ $item->nasabah->user->name }}</td>
                      <td>{{ $item->nasabah->namaRw->nama_rw }}</td>
                      <td>{{ $item->nasabah->no_telepon }}</td>
                      <td>{{ ucfirst($item->nasabah->jenis_kelamin) }}</td>
                      <td>{{ $item->klasifikasiSampah->kategori_sampah }}</td>
                      <td>Rp {{ number_format($item->klasifikasiSampah->harga_beli, 2) }}</td>
                      <td>{{ $item->jumlah_berat }} kg</td>
                      <td>Rp {{ number_format($item->jumlah_masuk, 2) }}</td>
                      <td class="text-center" style="font-size: 0.75rem;">
                        <!-- Tombol Lihat -->
                        <a href="{{ route('buku-keuangan-nasabah-keluar.create', ['id_masuk' => $item->id]) }}" class="btn btn-info btn-sm rounded-pill px-2 py-1 me-2">
                            <i class="fas fa-eye"></i>
                        </a>
                    
                        <!-- Tombol Edit -->
                        <a href="{{ route('buku_keuangan_nasabah_masuk.edit', $item->id) }}" class="btn btn-warning btn-sm rounded-pill px-2 py-1 me-2">
                            <i class="fas fa-edit"></i> 
                        </a>
                    
                        <!-- Tombol Cetak PDF -->
                        <a href="{{ route('buku_keuangan_nasabah_masuk.cetak', $item->id) }}" class="btn btn-secondary btn-sm rounded-pill px-2 py-1 me-2" target="_blank">
                            <i class="fas fa-file-pdf"></i> 
                        </a>
                    
                        <!-- Form Hapus -->
                        <form action="{{ route('buku_keuangan_nasabah_masuk.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-2 py-1" onclick="return confirm('Apakah Anda yakin?')">
                                <i class="fas fa-trash-alt"></i> 
                            </button>
                        </form>
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
  const table = document.getElementById("pemasukanTable");
  const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
  const searchInput = document.getElementById("searchInput");

  searchInput.addEventListener("keyup", function () {
    const filter = searchInput.value.toLowerCase();
    for (let i = 0; i < rows.length; i++) {
      const namaNasabahCell = rows[i].cells[2]; // Column index for 'Nama Nasabah' is 2
      const namaNasabah = namaNasabahCell ? namaNasabahCell.textContent.toLowerCase() : "";
      rows[i].style.display = namaNasabah.includes(filter) ? "" : "none";
    }
  });

  // Optional Pagination
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
