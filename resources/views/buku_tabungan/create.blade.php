@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku Tabungan</h2>

    <form action="{{ route('buku_tabungan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="data_nasabah_id">Nama Nasabah</label>
            <select name="data_nasabah_id" id="data_nasabah_id" class="form-control" required>
                <option value="">Pilih Nasabah</option>
                @foreach($dataNasabahs as $nasabah)
                    <option value="{{ $nasabah->id }}">{{ $nasabah->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="klasifikasi_sampah_id">Jenis Sampah</label>
            <select name="klasifikasi_sampah_id" id="klasifikasi_sampah_id" class="form-control" required>
                <option value="">Pilih Jenis Sampah</option>
                @foreach($klasifikasiSampahs as $sampah)
                    <option value="{{ $sampah->id }}">{{ $sampah->jenis_sampah }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kg">Jumlah Sampah (Kg)</label>
            <input type="number" name="kg" id="kg" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="debit">Debit</label>
            <input type="number" name="debit" id="debit" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kredit">Kredit</label>
            <input type="number" name="kredit" id="kredit" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" id="saldo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script>
    const debitInput = document.getElementById('debit');
    const kreditInput = document.getElementById('kredit');
    const saldoInput = document.getElementById('saldo');

    function updateSaldo() {
        const debit = parseFloat(debitInput.value) || 0;
        const kredit = parseFloat(kreditInput.value) || 0;
        saldoInput.value = debit - kredit;
    }

    debitInput.addEventListener('input', updateSaldo);
    kreditInput.addEventListener('input', updateSaldo);
</script>

@endsection
