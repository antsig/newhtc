<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ConvertsImagesToWebp;

class Banner extends Model
{
    use ConvertsImagesToWebp;
    
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($banner) {
            if ($banner->is_popup) {
                // Set semua banner lain menjadi is_popup = false
                static::where('id_banner', '!=', $banner->id_banner)->update(['is_popup' => false]);
            }
        });

        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('global_banners_kanan');
            \Illuminate\Support\Facades\Cache::forget('global_banners_kiri');
            \Illuminate\Support\Facades\Cache::forget('welcome_popup');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('global_banners_kanan');
            \Illuminate\Support\Facades\Cache::forget('global_banners_kiri');
            \Illuminate\Support\Facades\Cache::forget('welcome_popup');
        });
    }
}
