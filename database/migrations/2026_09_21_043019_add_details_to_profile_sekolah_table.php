<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_sekolah', function (Blueprint $table) {
            $table->string('principal')->nullable()->after('kepala_sekolah');
            $table->string('website')->nullable()->after('kontak');
            $table->string('school_photo')->nullable()->after('foto');
        });
    }

    public function down(): void
    {
        Schema::table('profil_sekolah', function (Blueprint $table) {
            $table->dropColumn([
                'principal',
                'website',
                'school_photo',
            ]);
        });
    }
};
