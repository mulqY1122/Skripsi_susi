<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Transaksi Masuk</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            width: 80mm;
            margin: auto;
            padding: 10px;
        }
        h2, h3 {
            text-align: center;
            margin: 5px 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 5px;
        }
        .logo img {
            width: 50px;
            height: auto;
        }
        .info {
            text-align: center;
            font-size: 12px;
        }
        hr {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        table {
            width: 100%;
            font-size: 13px;
        }
        td {
            padding: 3px 0;
        }
        .label {
            width: 50%;
        }
        .value {
            width: 50%;
            text-align: right;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 15px;
        }
        .signature {
            margin-top: 30px;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
            width: 45%;
        }
        .qr {
            text-align: center;
            margin-top: 10px;
        }
        .qr img {
            width: 60px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <!-- Ganti src logo sesuai file -->
        <img src="logo.png" alt="Logo">
    </div>

    <div class="info">
        <strong>Bank Sampah Nusantara</strong><br>
        Jl. Contoh No.123, Jakarta<br>
        Telp: 0812-3456-7890
    </div>

    <h2>NOTA PEMASUKAN</h2>
    <hr>

    <table>
        <tr>
            <td class="label">Nama Nasabah</td>
            <td class="value">{{ $pemasukan->nasabah->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Klasifikasi Sampah</td>
            <td class="value">{{ $pemasukan->klasifikasiSampah->kategori_sampah ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Jumlah Berat</td>
            <td class="value">{{ $pemasukan->jumlah_berat }} kg</td>
        </tr>
        <tr>
            <td class="label">Jumlah Masuk</td>
            <td class="value">Rp {{ number_format($pemasukan->jumlah_masuk, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Masuk</td>
            <td class="value">{{ \Carbon\Carbon::parse($pemasukan->tanggal_masuk)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Keterangan</td>
            <td class="value">{{ $pemasukan->keterangan }}</td>
        </tr>
    </table>

    <hr>

    <div class="qr">
        <!-- Ganti dengan QR generator dinamis bila perlu -->
        <img src="qrcode.png" alt="QR Code">
    </div>

    <div class="signature">
        <div>
            Petugas,<br><br><br>
            (_________________)
        </div>
        <div>
            Nasabah,<br><br><br>
            (_________________)
        </div>
    </div>

    <div class="footer">
        Dicetak otomatis oleh sistem<br>
        Terima kasih telah bertransaksi bersama kami
    </div>
</body>
</html>
