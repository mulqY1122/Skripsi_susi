<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nama_rw_id', // jangan lupa tambahkan ini agar mass assignment bisa (optional tapi disarankan)
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function ketuaRw()
    {
        return $this->hasOne(KetuaRw::class);
    }

    // Relasi dengan DataNasabah
    public function dataNasabah()
    {
        return $this->hasOne(DataNasabah::class);
    }


    // Di model User
    public function namaRw()
    {
        return $this->belongsTo(NamaRw::class, 'nama_rw_id');
    }
}
