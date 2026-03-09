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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nis')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_tlpn');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('user_id')->nullable();  // Menambahkan kolom user_id
            $table->timestamps();

            // Menambahkan foreign key untuk kolom user_id
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null'); 

            // Relasi dengan tabel kelas
            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('siswa');
    }
};