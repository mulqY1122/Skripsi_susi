<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanBulananTable extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_bulanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit');
            $table->foreignId('ketua_rw_id')->constrained('ketua_rw')->onDelete('cascade'); // relasi ke RW
            $table->foreignId('klasifikasi_sampah_id')->constrained('klasifikasi_sampah')->onDelete('cascade'); // relasi ke klasifikasi sampah
            $table->string('nama_sampah');
            $table->float('berat'); // dalam kg, misalnya
            $table->decimal('harga', 10, 2); // harga per kg
            $table->decimal('total_harga', 12, 2); // berat x harga
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_bulanan');
    }
}
