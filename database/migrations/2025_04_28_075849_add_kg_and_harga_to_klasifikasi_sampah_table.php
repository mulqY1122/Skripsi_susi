<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKgAndHargaToKlasifikasiSampahTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('klasifikasi_sampah', function (Blueprint $table) {
            $table->decimal('kg', 8, 2)->default(0)->after('deskripsi');
            $table->decimal('harga_jual', 12, 2)->default(0)->after('kg');
            $table->decimal('harga_beli', 12, 2)->default(0)->after('harga_jual');
        });
    }

    /**
     * Batalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('klasifikasi_sampah', function (Blueprint $table) {
            $table->dropColumn(['kg', 'harga_jual', 'harga_beli']);
        });
    }
}
