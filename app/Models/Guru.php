<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'foto',
    ];
}
