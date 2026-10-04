<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use HasFactory;

    // HUBUNGKAN KAN KE NAMA TABEL YANG BENAR
    protected $table = 'profil_sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'kepala_sekolah',
        'tahun_berdiri',
        'kontak',
        'alamat',
        'deskripsi',
        'visi_misi',
        'logo',
    ];
}
