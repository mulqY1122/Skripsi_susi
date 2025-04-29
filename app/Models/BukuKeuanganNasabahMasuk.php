<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKeuanganNasabahMasuk extends Model
{
    use HasFactory;

    protected $table = 'buku_keuangan_nasabah_masuk'; // Nama tabel
    protected $fillable = [
        'data_nasabah_id',
        'klasifikasi_sampah_id',
        'jumlah_berat',
        'jumlah_masuk',
        'tanggal_masuk',
        'keterangan',
    ];

    // Relasi ke DataNasabah
    public function nasabah()
    {
        return $this->belongsTo(DataNasabah::class, 'data_nasabah_id');
    }

    // Relasi ke KlasifikasiSampah
    public function klasifikasiSampah()
    {
        return $this->belongsTo(KlasifikasiSampah::class, 'klasifikasi_sampah_id');
    }
    // Di model BukuKeuanganNasabahMasuk
    public function bukuKeuanganNasabahKeluar()
    {
        return $this->hasMany(BukuKeuanganNasabahKeluar::class, 'buku_keuangan_nasabah_masuk_id');
    }
}
