<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

trait ConvertsImagesToWebp
{
    public static function bootConvertsImagesToWebp()
    {
        static::saving(function ($model) {
            $imageFields = $model->imageFields ?? ['gambar']; // Default field is 'gambar'
            
            foreach ($imageFields as $field) {
                if ($model->isDirty($field) && $model->{$field}) {
                    $originalPath = $model->{$field};
                    
                    // Cek apakah bukan .webp
                    if (!Str::endsWith(strtolower($originalPath), '.webp')) {
                        $fullPath = Storage::disk('public')->path($originalPath);
                        
                        if (File::exists($fullPath)) {
                            try {
                                $image = Image::decode($fullPath);
                                $newPath = Str::replaceLast('.' . File::extension($originalPath), '.webp', $originalPath);
                                $newFullPath = Storage::disk('public')->path($newPath);
                                
                                $image->save($newFullPath, 90);
                                
                                if ($originalPath !== $newPath) {
                                    File::delete($fullPath);
                                    $model->{$field} = $newPath;
                                }
                            } catch (\Throwable $e) {
                                // Biarkan jika gagal (mungkin bukan gambar yang valid)
                            }
                        }
                    }
                }
            }
        });
    }
}
