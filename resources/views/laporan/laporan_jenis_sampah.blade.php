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
                    <h1 class="m-0">Laporan Total Sampah Berdasarkan Klasifikasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Laporan Total Sampah Berdasarkan Klasifikasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @forelse($laporanJenisSampah as $bulan => $laporans)
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-calendar-alt me-2"></i>
                <strong>Laporan Bulan: {{ $bulan }}</strong>
            </div>
            <a href="#" class="btn btn-sm btn-light text-primary" onclick="alert('Fitur export belum tersedia')">
                <i class="fas fa-print"></i> Export PDF
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Klasifikasi Sampah</th>
                            <th>Total Berat (kg)</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalBerat = 0;
                            $totalHarga = 0;
                        @endphp
                        @foreach($laporans as $index => $laporan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $laporan->klasifikasiSampah->jenis_sampah ?? '-' }} - {{ $laporan->klasifikasiSampah->kategori_sampah ?? '-' }}</td>
                            <td>{{ number_format($laporan->total_berat, 2) }} kg</td>
                            <td>Rp {{ number_format($laporan->total_harga, 2, ',', '.') }}</td>

                            @php
                                $totalBerat += $laporan->total_berat;
                                $totalHarga += $laporan->total_harga;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-light">
                            <th colspan="2" class="text-end">Total Bulan Ini:</th>
                            <th>{{ number_format($totalBerat, 2) }} kg</th>
                            <th>Rp {{ number_format($totalHarga, 2, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle me-1"></i> Belum ada data laporan klasifikasi per bulan.
    </div>
@endforelse


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Enable search functionality
        let table = document.querySelector("table tbody");
        let searchInput = document.getElementById("search");

        searchInput.addEventListener("keyup", function () {
            let filter = searchInput.value.toLowerCase();
            let rows = table.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                let text = rows[i].textContent.toLowerCase();
                rows[i].style.display = text.includes(filter) ? "table-row" : "none";
            }
        });
    });
</script>
@endsection
