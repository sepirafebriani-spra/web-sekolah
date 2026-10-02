<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'ekstrakurikuler';

    // Tentukan primary key kustom
    protected $primaryKey = 'id_ekskul';

    // Field yang boleh diisi
    protected $fillable = [
        'nama_ekskul',
        'id_guru',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];

    // Relasi ke Model Guru (Foreign Key id_guru)
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
