<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product(){
        return $this->hasMany(Product::class);
    }

    public static function arrForSelect(){
        $arr = [];
        $category = Category::all();
        

        foreach ($category as $category) {
            $arr[$category->id] = $category->title;
        }

        return $arr;
    }
}
