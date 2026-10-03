<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('guru')) {
            Schema::create('guru', function (Blueprint $table) {
                $table->id('id_guru');
                $table->string('nip')->nullable();
                $table->string('nama_guru');
                $table->string('mapel')->nullable();
                $table->string('foto')->nullable();
                $table->timestamps();
            });
        }
    }

        public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
