<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'title', 'description', 'cost_price', 'price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function saleitems(){
        return $this->hasMany(SaleItems::class);
    }

    public function purchesitems(){
        return $this->hasMany(PurchesItems::class);
    }

    public static function arrForSelect(){
        $arr = [];
        $products = Product::all();

        foreach($products as $product){
            $arr[$product->id] = $product->title;
        }

        return $arr;
    }

}
