<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'image_path',
        'product_id',
    ];
    public function images()
{
    return $this->hasMany(ImageModel::class, 'product_id');
}
}
