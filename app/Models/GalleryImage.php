<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['gallery_folder_id', 'image_path', 'sort_order'];

    public function folder()
    {
        return $this->belongsTo(GalleryFolder::class);
    }
}
