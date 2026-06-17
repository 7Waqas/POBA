<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryFolder extends Model
{
    protected $fillable = ['folder_name', 'description', 'type', 'class_year', 'slug'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }
}
