<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKeuanganNasabahKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('buku_keuangan_nasabah_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_keuangan_nasabah_masuk_id');
            $table->foreign('buku_keuangan_nasabah_masuk_id', 'fk_buku_keluar_masuk')
                ->references('id')
                ->on('buku_keuangan_nasabah_masuk')
                ->onDelete('cascade');
            $table->decimal('jumlah_keluar', 15, 2);
            $table->date('tanggal_keluar');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku_keuangan_nasabah_keluar');
    }
}
