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
        // Matikan pengecekan foreign key sementara
        Schema::disableForeignKeyConstraints();

        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_ekskul');
            $table->string('nama_ekskul');
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('set null');
            $table->string('pembina')->nullable();
            $table->string('jadwal_latihan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Aktifkan kembali pengecekan foreign key
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler');
    }
};
