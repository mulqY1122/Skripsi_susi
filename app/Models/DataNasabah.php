<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNasabah extends Model
{
    use HasFactory;

    protected $table = 'data_nasabah';

    protected $fillable = [
        'user_id',
        'nama_rw_id',
        'no_telepon',
        'jenis_kelamin',
        'foto_profil'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan NamaRw
    public function namaRw()
    {
        return $this->belongsTo(NamaRw::class, 'nama_rw_id');
    }
    public function bukuTabungans()
    {
        return $this->hasMany(BukuTabungan::class, 'data_nasabah_id');
    }
}
