<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKeuanganNasabahMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_keuangan_nasabah_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_nasabah_id')->constrained('data_nasabah')->onDelete('cascade'); // relasi ke data_nasabah
            $table->foreignId('klasifikasi_sampah_id')->constrained('klasifikasi_sampah')->onDelete('cascade'); // relasi ke klasifikasi_sampah
            $table->decimal('jumlah_berat', 12, 2); // berat sampah yang diambil
            $table->decimal('jumlah_masuk', 15, 2); // hasil dari berat * harga beli
            $table->date('tanggal_masuk'); // tanggal uang masuk
            $table->text('keterangan')->nullable(); // keterangan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_keuangan_nasabah_masuk');
    }
}
