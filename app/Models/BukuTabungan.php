<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTabungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_nasabah_id',
        'klasifikasi_sampah_id',
        'tanggal',
        'kg',
        'debit',
        'kredit',
        'saldo',
    ];

    /**
     * Relasi dengan model DataNasabah
     * Menghubungkan buku tabungan dengan data nasabah
     */
    public function dataNasabah()
    {
        return $this->belongsTo(DataNasabah::class, 'data_nasabah_id');
    }

    /**
     * Relasi dengan model KlasifikasiSampah
     * Menghubungkan buku tabungan dengan klasifikasi sampah
     */
    public function klasifikasiSampah()
    {
        return $this->belongsTo(KlasifikasiSampah::class, 'klasifikasi_sampah_id');
    }
}
