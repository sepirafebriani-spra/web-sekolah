<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan 'gurus'
    protected $table = 'guru';

    // TAMBAHKAN BARIS INI: Tentukan Primary Key tabel Anda
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];
}