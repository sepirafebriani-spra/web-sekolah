<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    protected $table = 'profil_sekolah';

    protected $primaryKey = 'id_profil';

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
