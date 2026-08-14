<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas';
    protected $primaryKey = 'id_identitas';
    protected $fillable = [
        'nama_website',
        'email',
        'url',
        'facebook',
        'sosmed',
        'rekening',
        'no_telp',
        'meta_deskripsi',
        'meta_keyword',
        'favicon',
        'logo',
        'maps',
    ];

    protected $casts = [
        'sosmed' => 'array',
    ];
}
