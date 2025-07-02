<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CategoryModel extends Model
{
        protected $table = "category" ;
        protected $fillable = [
        'name',
        'description',
        'status',
        'icon',
    ];
    public function products(): HasMany
{
    return $this->hasMany(ProductModel::class, 'category_id');
}
}
