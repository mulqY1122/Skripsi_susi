<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTabunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_tabungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_nasabah_id')->constrained('data_nasabah')->onDelete('cascade'); // Menghubungkan dengan tabel data_nasabah
            $table->foreignId('klasifikasi_sampah_id')->constrained('klasifikasi_sampah')->onDelete('cascade'); // Menghubungkan dengan tabel klasifikasi_sampah
            $table->date('tanggal');
            $table->decimal('kg', 8, 2); // Jumlah kilogram
            $table->decimal('debit', 10, 2); // Nilai debit
            $table->decimal('kredit', 10, 2); // Nilai kredit
            $table->decimal('saldo', 10, 2); // Saldo
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
        Schema::dropIfExists('buku_tabungan');
    }
}
