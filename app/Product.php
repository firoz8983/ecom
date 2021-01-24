<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'additional_info', 'category_id', 'subcategory_id'];


    public function category(){
        return $this->hasone(Category::class,'id','category_id');
    }
}
