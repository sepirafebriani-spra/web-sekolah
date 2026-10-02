<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    // Sesuaikan nama tabel dengan nama di migration (pakai akhiran 's')
    protected $table = 'profil_sekolahs';

    // Sesuaikan primary key (bawaan migration $table->id() adalah 'id')
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
