<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaRw extends Model
{
    use HasFactory;

    protected $table = 'nama_rw';

    protected $fillable = [
        'nama_rw',
        'deskripsi',
        'alamat',
    ];

    public function ketuaRw()
    {
        return $this->hasOne(KetuaRw::class, 'nama_rw_id');
    }
    public function dataNasabah()
    {
        return $this->hasMany(DataNasabah::class);
    }
}
