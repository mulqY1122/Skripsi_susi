<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit'); // 1. Nama Unit
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 2. Relasi ke users
            $table->string('nama_rw'); // 3. Nama RW
            $table->string('nama_unit_bank_sampah'); // 4. Nama Unit Bank Sampah
            $table->string('penanggung_jawab'); // 5. Penanggung Jawab
            $table->string('no_wa'); // 6. No WhatsApp
            $table->text('alamat'); // 7. Alamat
            $table->integer('jumlah_nasabah'); // 8. Jumlah Nasabah
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
