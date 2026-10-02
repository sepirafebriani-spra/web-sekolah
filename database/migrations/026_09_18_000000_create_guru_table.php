<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            // Wajib diset id() atau primaryKey agar memiliki INDEX
            $table->id('id_guru');
            $table->string('nip')->unique()->nullable();
            $table->string('nama_guru');
            $table->string('mapel')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
