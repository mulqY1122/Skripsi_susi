<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaRw extends Model
{
    use HasFactory;

    protected $table = 'ketua_rw';

    protected $fillable = [
        'user_id',
        'nama_rw_id',
        'no_telpon',
        'jenis_kelamin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function namaRw()
    {
        return $this->belongsTo(NamaRw::class, 'nama_rw_id');
    }
    // Tambahkan di dalam class KetuaRw
    public function laporanBulanan()
    {
        return $this->hasMany(LaporanBulanan::class, 'ketua_rw_id');
    }
}
