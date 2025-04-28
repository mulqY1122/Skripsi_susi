<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    use HasFactory;

    protected $table = 'laporan_bulanan';

    protected $fillable = [
        'nama_unit',
        'ketua_rw_id',
        'klasifikasi_sampah_id',
        'nama_sampah',
        'berat',
        'harga',
        'total_harga',
        'keterangan',
    ];

    // Relasi ke ketua rw
    public function ketuaRw()
    {
        return $this->belongsTo(KetuaRw::class, 'ketua_rw_id');
    }

    // Relasi ke klasifikasi sampah
    public function klasifikasiSampah()
    {
        return $this->belongsTo(KlasifikasiSampah::class, 'klasifikasi_sampah_id');
    }
}
