<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'nama_unit',
        'user_id',
        'nama_rw',
        'nama_unit_bank_sampah',
        'penanggung_jawab',
        'no_wa',
        'alamat',
        'jumlah_nasabah',
    ];

    /**
     * Relasi ke model User
     * Mengambil user yang menjadi admin unit ini
     */
    public function user()
    {
        return $this->belongsTo(User::class)->where('role_name', 'Admin');
    }
    public function rekapSampah()
    {
        return $this->hasMany(RekapSampah::class);
    }
}
