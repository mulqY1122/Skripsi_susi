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
    .table th {
    font-size: 0.rem; /* Ukuran font lebih kecil */
  }
  </style>
  
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Bulanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data tabungan RW per Bulan</li>
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
                            <h3 class="card-title">Data tabungan RW per Bulan</h3>
                            <div class="card-tools">
                                <a href="{{ route('laporan_bulanan.create') }}" class="btn btn-primary">+ Tambah Laporan</a>
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

                            <input type="text" id="search" placeholder="Cari Laporan" class="form-control mb-3">

                            @forelse($laporanBulanan as $bulan => $laporans)
                            <h5 class="mt-4 mb-2 text-primary">Laporan Bulan: {{ $bulan }}</h5>
                            <table class="table table-bordered table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Unit</th>
                                        <th>Penanggung jawab</th>
                                        <th>Alamat Penanggung jawab</th>
                                        <th>RW</th>
                                        <th>No Telpon Penanggung jawab</th>
                                        <th>Jenis Sampah</th>
                                        <th>Nama Sampah</th>
                                        <th>Berat (kg)</th>
                                        <th>Harga/kg</th>
                                        <th>Total Harga</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporans as $laporan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $laporan->nama_unit }}</td>
                                        <td>{{ $laporan->ketuaRw->user->name ?? '-' }}</td>
                                        <td>{{ $laporan->ketuaRw->namaRw->nama_rw ?? '-' }}</td>
                                        <td>{{ $laporan->ketuaRw->namaRw->alamat ?? '-' }}</td>
                                        <td>{{ $laporan->ketuaRw->no_telpon ?? '-' }}</td>
                                        <td>{{ $laporan->klasifikasiSampah->jenis_sampah ?? '-' }} - {{ $laporan->klasifikasiSampah->kategori_sampah ?? '-' }}</td>
                                        <td>{{ $laporan->nama_sampah }}</td>
                                        <td>{{ number_format($laporan->berat, 2) }}</td>
                                        <td>Rp{{ number_format($laporan->harga ?? 0, 0, ',', '.') }}</td>

                                        <td>Rp{{ number_format($laporan->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $laporan->keterangan ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('laporan_bulanan.edit', $laporan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ route('laporan_bulanan.show', $laporan->id) }}" class="btn btn-sm btn-warning">Show</a>
                                            <form action="{{ route('laporan_bulanan.destroy', $laporan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @empty
                            <p class="text-center">Belum ada data laporan.</p>
                        @endforelse
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let table = document.getElementById("laporanTable");
        let searchInput = document.getElementById("search");
        let rows = table.getElementsByTagName("tr");

        searchInput.addEventListener("keyup", function () {
            let filter = searchInput.value.toLowerCase();
            for (let i = 0; i < rows.length; i++) {
                let text = rows[i].textContent.toLowerCase();
                rows[i].style.display = text.includes(filter) ? "table-row" : "none";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        let searchInput = document.getElementById("search");

        searchInput.addEventListener("keyup", function () {
            let filter = searchInput.value.toLowerCase();
            let allRows = document.querySelectorAll("table tbody tr");

            allRows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    });
</script>
@endsection
