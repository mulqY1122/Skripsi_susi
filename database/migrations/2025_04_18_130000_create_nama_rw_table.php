<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaRwTable extends Migration
{
    public function up(): void
    {
        Schema::create('nama_rw', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rw');
            $table->text('deskripsi')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nama_rw');
    }
}
