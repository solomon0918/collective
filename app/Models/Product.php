<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = ['category'];

    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }

    public function scopePrice($query, $min, $max){
        $query->where("price", ">=", $min)->where("price", "<=", $max);
    }

    public function scopeHasCategory($query, $category){
        $query->where("category_id", "=", $category);
    }

    public function scopeAvailable($query, $available){
        $query->where("available", "=", $available);
    }
}
