<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapSampahTable extends Migration
{
    public function up()
    {
        Schema::create('rekap_sampah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade'); // relasi ke units
            $table->foreignId('klasifikasi_sampah_id')->constrained('klasifikasi_sampah')->onDelete('cascade'); // relasi ke klasifikasi sampah
            $table->string('nama_sampah'); // kolom tambahan untuk nama sampah
            $table->float('volume_sampah'); // dalam kg atau satuan lainnya
            $table->decimal('harga_sampah', 10, 2); // harga per kg atau satuan
            $table->decimal('total_harga', 10, 2); // hasil dari volume * harga
            $table->string('dokumentasi')->nullable(); // kolom untuk menyimpan path gambar/file
            $table->text('keterangan')->nullable(); // kolom untuk keterangan tambahan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekap_sampah');
    }
}
