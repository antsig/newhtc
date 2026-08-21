<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class Identitas extends Model
{
    use ConvertsImagesToWebp;
    public $imageFields = ['favicon', 'logo'];

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
        'sejarah',
        'visi_misi',
        'legalitas',
        'tim',
    ];

    protected $casts = [
        'sosmed' => 'array',
    ];
}
