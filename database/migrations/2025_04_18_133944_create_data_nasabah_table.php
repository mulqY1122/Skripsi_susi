<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataNasabahTable extends Migration
{
    public function up(): void
    {
        Schema::create('data_nasabah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Menghubungkan dengan tabel users
            $table->foreignId('nama_rw_id')->constrained('nama_rw')->onDelete('cascade'); // Menghubungkan dengan tabel nama_rw
            $table->string('no_telepon')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_nasabah');
    }
}
