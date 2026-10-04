<?php

namespace App\Models;

use Database\Factories\GaleriFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    /** @use HasFactory<GaleriFactory> */
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $guarded = [
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];
}
