<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kereta', function (Blueprint $table) {
            // Kolom id sebagai primary key auto increment
            $table->bigIncrements('id'); // id akan otomatis menjadi auto_increment primary key

            // Kolom lain untuk jadwal kereta
            $table->string('nama_kereta');
            $table->string('stasiun_awal');
            $table->string('stasiun_tujuan');
            $table->time('waktu_keberangkatan');
            $table->time('waktu_kedatangan');
            
            // Timestamps untuk created_at dan updated_at
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
        Schema::dropIfExists('jadwal_kereta');
    }
}
