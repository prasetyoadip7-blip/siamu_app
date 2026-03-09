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
    Schema::create('nilais', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('siswa_id');
    $table->unsignedBigInteger('mapel_id');

    $table->string('semester');
    $table->integer('nilai');
    $table->timestamps();

    $table->foreign('siswa_id')
          ->references('id_siswa')
          ->on('siswa')
          ->onDelete('cascade');

    $table->foreign('mapel_id')
          ->references('id_mapel')
          ->on('mapel')
          ->onDelete('cascade');
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
