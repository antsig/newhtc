<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class Album extends Model
{
    use ConvertsImagesToWebp;

    public $imageFields = ['gbr_album'];

    protected $fillable = [
        'jdl_album',
        'album_seo',
        'keterangan',
        'gbr_album',
        'photos',
        'aktif',
        'hits_album',
        'hari',
        'tgl_posting',
        'jam',
        'username',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
    protected $table = 'album';
    protected $primaryKey = 'id_album';
    protected $guarded = [];
}
