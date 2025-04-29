<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKeuanganNasabahKeluar extends Model
{
    use HasFactory;

    protected $table = 'buku_keuangan_nasabah_keluar';

    protected $fillable = [
        'buku_keuangan_nasabah_masuk_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'keterangan',
    ];

    public function bukuKeuanganMasuk()
    {
        return $this->belongsTo(BukuKeuanganNasabahMasuk::class, 'buku_keuangan_nasabah_masuk_id');
    }
}
