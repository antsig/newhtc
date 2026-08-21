<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class Kategori extends Model
{
    use ConvertsImagesToWebp;
    public $imageFields = ['gambar_utama'];

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $guarded = [];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_kategori', 'id_kategori');
    }
}
