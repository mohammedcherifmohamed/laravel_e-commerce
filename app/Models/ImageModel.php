<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    use HasFactory;

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
