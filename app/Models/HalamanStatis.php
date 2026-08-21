<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class HalamanStatis extends Model
{
    use ConvertsImagesToWebp;
    
    protected $table = 'halamanstatis';
    protected $primaryKey = 'id_halaman';
    protected $guarded = [];
}
