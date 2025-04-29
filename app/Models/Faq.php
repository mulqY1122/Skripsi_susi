<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'alamat_jemput', // Tambahan disini
        'subject',
        'message',
        'answer',
    ];

    /**
     * Get the user that owns the FAQ.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
