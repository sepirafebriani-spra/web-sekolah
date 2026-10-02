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
        Schema::disableForeignKeyConstraints();

        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul');
            $table->longText('isi');
            $table->date('tanggal')->nullable();
            $table->string('gambar', 255)->nullable();

            // Mengarah ke tabel 'users' bawaan Laravel (kolom 'id')
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
