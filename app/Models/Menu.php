<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Menu::class, 'id_parent', 'id_menu')->orderBy('urutan', 'asc');
    }
}
