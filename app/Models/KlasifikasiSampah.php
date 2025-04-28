<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSampah extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'klasifikasi_sampah';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'jenis_sampah',
        'kategori_sampah',
        'deskripsi',
    ];

    /**
     * Jika ada relasi, tambahkan metode di sini.
     * Contoh relasi ke tabel lain (jika diperlukan):
     * 
     * public function kategori()
     * {
     *     return $this->belongsTo(Kategori::class);
     * }
     */
    public function rekapSampah()
    {
        return $this->hasMany(RekapSampah::class);
    }

    public function bukuTabungans()
    {
        return $this->hasMany(BukuTabungan::class, 'klasifikasi_sampah_id');
    }
    // Tambahkan di dalam class KlasifikasiSampah
    public function laporanBulanan()
    {
        return $this->hasMany(LaporanBulanan::class, 'klasifikasi_sampah_id');
    }
}
