@extends('layouts.app')

@section('content')
    <h1>Tambah Jadwal Penjemputan Sampah</h1>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" id="tanggal" required><br><br>

        <label>Hari:</label><br>
        <input type="text" name="hari" id="hari" readonly><br><br>

        <label>Waktu Mulai:</label><br>
        <input type="time" name="waktu_mulai" required><br><br>

        <label>Waktu Berakhir:</label><br>
        <input type="time" name="waktu_berakhir" required><br><br>

        <label>Lokasi Penjemputan:</label><br>
        <input type="text" name="lokasi_penjemputan" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <script>
        document.getElementById('tanggal').addEventListener('change', function () {
            const tanggalInput = this.value;
            if (!tanggalInput) return;

            const tanggal = new Date(tanggalInput);
            const options = { weekday: 'long' };
            const hari = tanggal.toLocaleDateString('id-ID', options);

            document.getElementById('hari').value = hari.charAt(0).toUpperCase() + hari.slice(1); // Kapital awal
        });
    </script>
@endsection
