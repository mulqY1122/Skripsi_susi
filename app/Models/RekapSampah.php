<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapSampah extends Model
{
    use HasFactory;

    protected $table = 'rekap_sampah';

    protected $fillable = [
        'unit_id',
        'klasifikasi_sampah_id',
        'nama_sampah',        // ditambahkan
        'volume_sampah',
        'harga_sampah',
        'total_harga',
        'dokumentasi',        // ditambahkan
        'keterangan',         // ditambahkan
    ];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Relasi ke Klasifikasi Sampah
    public function klasifikasiSampah()
    {
        return $this->belongsTo(KlasifikasiSampah::class);
    }
}
