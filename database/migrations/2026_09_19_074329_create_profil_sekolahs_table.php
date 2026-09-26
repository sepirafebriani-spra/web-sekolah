<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->integer('id_profile')->autoIncrement();
            $table->string('nama_sekolah');
            $table->string('kepala_sekolah');
            $table->string('foto', 100);
            $table->string('logo', 100);
            $table->string('npsn', 10);
            $table->string('alamat');
            $table->string('kontak', 15);
            $table->string('visi_misi');
            $table->year('tahun_berdiri');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profileSekolah');
    }
};
