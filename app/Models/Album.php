<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
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
