<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model (optional jika sesuai konvensi)
    protected $table = 'pengumuman';

    // Nama kolom primary key yang digunakan oleh tabel
    protected $primaryKey = 'id_pengumuman';

    // Tentukan kolom-kolom yang boleh diisi (mass-assignable)
    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'tanggal_mulai',
        'tanggal_berakhir',
        'penulis_pengumuman',
        'status_pengumuman'
    ];

    // Tentukan kolom yang di-cast (misalnya tanggal untuk auto-conversion ke Carbon)
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
    ];

    // Tentukan apakah primary key adalah auto-increment (default true)
    public $incrementing = true;

    // Tipe data dari primary key
    protected $keyType = 'int';

    // Timestamps (created_at, updated_at) dikelola secara otomatis
    public $timestamps = true;
}