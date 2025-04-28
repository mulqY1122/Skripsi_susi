<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku Tabungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .header, .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
            font-weight: bold;
            color: #333;
        }
        td {
            font-size: 14px;
            color: #333;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 15px;
            font-size: 12px;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }
        .total-row {
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        .note {
            text-align: center;
            margin-top: 40px;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Buku Tabungan</h1>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Nama Nasabah</th>
                        <th>Tanggal</th>
                        <th>Kg</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo</th>
                        <th>Klasifikasi Sampah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $bukuTabungan->dataNasabah->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($bukuTabungan->tanggal)->format('d M Y') }}</td>
                        <td>{{ $bukuTabungan->kg }}</td>
                        <td>+Rp{{ number_format($bukuTabungan->debit, 0, ',', '.') }}</td>
                        <td>-Rp{{ number_format($bukuTabungan->kredit, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($bukuTabungan->saldo, 0, ',', '.') }}</td>
                        <td>{{ $bukuTabungan->klasifikasiSampah->jenis_sampah }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <p>Terima kasih atas kepercayaan Anda.</p>
            <p>Generated on: {{ \Carbon\Carbon::now()->format('d M Y, H:i:s') }}</p>
        </div>

        <div class="note">
            <p>Harap simpan nota ini sebagai bukti transaksi.</p>
        </div>
    </div>
</body>
</html>
