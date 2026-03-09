<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('jadwal', function (Blueprint $table) {
        $table->id('id_jadwal');

        $table->unsignedBigInteger('id_kelas');
        $table->unsignedBigInteger('id_guru');
        $table->unsignedBigInteger('id_mapel');

        $table->string('hari');
        $table->time('jam_mulai');
        $table->time('jam_selesai');

        $table->timestamps();

        $table->foreign('id_kelas')
              ->references('id_kelas')->on('kelas')
              ->onDelete('cascade');

        $table->foreign('id_guru')
              ->references('id_guru')->on('guru')
              ->onDelete('cascade');

        $table->foreign('id_mapel')
              ->references('id_mapel')->on('mapel')
              ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
