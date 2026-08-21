<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class Berita extends Model
{
    use ConvertsImagesToWebp;
    
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
