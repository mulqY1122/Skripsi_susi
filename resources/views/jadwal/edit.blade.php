@extends('layouts.app')

@section('content')
    <h1>Edit Jadwal Penjemputan Sampah</h1>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" id="tanggal" value="{{ $jadwal->tanggal }}" required><br><br>

        <label>Hari:</label><br>
        <input type="text" name="hari" id="hari" value="{{ $jadwal->hari }}" readonly><br><br>

        <label>Waktu Mulai:</label><br>
        <input type="time" name="waktu_mulai" value="{{ $jadwal->waktu_mulai }}" required><br><br>

        <label>Waktu Berakhir:</label><br>
        <input type="time" name="waktu_berakhir" value="{{ $jadwal->waktu_berakhir }}" required><br><br>

        <label>Lokasi Penjemputan:</label><br>
        <input type="text" name="lokasi_penjemputan" value="{{ $jadwal->lokasi_penjemputan }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <script>
        // Fungsi untuk ambil nama hari
        function updateHari(tanggalInput) {
            const tanggal = new Date(tanggalInput);
            const options = { weekday: 'long' };
            const hari = tanggal.toLocaleDateString('id-ID', options);
            document.getElementById('hari').value = hari.charAt(0).toUpperCase() + hari.slice(1);
        }

        // Auto isi hari saat load awal
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalVal = document.getElementById('tanggal').value;
            if (tanggalVal) {
                updateHari(tanggalVal);
            }
        });

        // Auto update hari saat user ubah tanggal
        document.getElementById('tanggal').addEventListener('change', function () {
            updateHari(this.value);
        });
    </script>
@endsection
