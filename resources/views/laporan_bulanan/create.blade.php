@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Laporan Bulanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('laporan_bulanan.index') }}">Data Laporan Bulanan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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
                            <h3 class="card-title">Form Tambah Laporan Bulanan</h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Ups!</strong> Ada beberapa masalah pada inputan Anda.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('laporan_bulanan.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label>Nama Unit</label>
                                    <input type="text" name="nama_unit" class="form-control" value="{{ old('nama_unit') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Data RW</label>
                                    <select name="ketua_rw_id" class="form-control" required>
                                        <option value="">-- Pilih Ketua RW --</option>
                                        @foreach($ketuaRw as $rw)
                                            <option value="{{ $rw->id }}" {{ old('ketua_rw_id') == $rw->id ? 'selected' : '' }}>
                                                {{ $rw->user->name ?? 'Ketua RW' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Jenis & Kategori Sampah</label>
                                    <select name="klasifikasi_sampah_id" id="klasifikasi_sampah_id" class="form-control" required>
                                        <option value="">-- Pilih Jenis Sampah --</option>
                                        @foreach($klasifikasiSampah as $sampah)
                                            <option value="{{ $sampah->id }}" data-harga="{{ $sampah->harga_jual }}"
                                                {{ old('klasifikasi_sampah_id') == $sampah->id ? 'selected' : '' }}>
                                                {{ $sampah->jenis_sampah }} - {{ $sampah->kategori_sampah }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Sampah</label>
                                    <input type="text" name="nama_sampah" class="form-control" value="{{ old('nama_sampah') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Berat (kg)</label>
                                    <input type="number" name="berat" id="berat" class="form-control" step="0.01" value="{{ old('berat') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Harga per Kg</label>
                                    <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" readonly required>
                                </div>

                                <div class="mb-3">
                                    <label>Total Harga</label>
                                    <input type="number" name="total_harga" id="total_harga" class="form-control" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('laporan_bulanan.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const beratInput = document.getElementById('berat');
        const hargaInput = document.getElementById('harga');
        const totalInput = document.getElementById('total_harga');
        const klasifikasiSelect = document.getElementById('klasifikasi_sampah_id');

        function updateHarga() {
            const selectedOption = klasifikasiSelect.options[klasifikasiSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga') || 0;
            hargaInput.value = harga;
            updateTotal();
        }

        function updateTotal() {
            const berat = parseFloat(beratInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;
            totalInput.value = (berat * harga).toFixed(2);
        }

        beratInput.addEventListener('input', updateTotal);
        klasifikasiSelect.addEventListener('change', updateHarga);

        // Initial call if form has old values
        updateHarga();
        updateTotal();
    });
</script>
@endsection
