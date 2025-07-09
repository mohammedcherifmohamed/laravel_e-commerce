<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class ProductModel extends Model
{
    protected $table = 'products';
     protected $fillable = [
        'name',
        'description',
        'status',
        'price',
        'category_id',
        'quantity',
        'rating',
    ];
        public function category()
        {
            return $this->belongsTo(CategoryModel::class, 'category_id');
        }
        public function images()
        {
            return $this->hasMany(ImageModel::class, 'product_id');
        }
}
