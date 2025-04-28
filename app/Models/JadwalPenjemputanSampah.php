<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPenjemputanSampah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_penjemputan_sampah';

    protected $fillable = [
        'tanggal',
        'hari',
        'waktu_mulai',
        'waktu_berakhir',
        'lokasi_penjemputan',
    ];
}
