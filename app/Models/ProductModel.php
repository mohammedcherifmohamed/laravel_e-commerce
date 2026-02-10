<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use Illuminate\Support\Str;

class ProductModel extends Model
{
    use HasFactory;

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

        protected static function booted(){


        static::creating(function($product){
            $product->slug = Str::slug($product->name);
        });

        static::updating(function($product){
            $product->slug = Str::slug($product->name);
        });


    }

}
