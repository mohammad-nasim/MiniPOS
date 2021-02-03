<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductStockController extends Controller
{
    //ViewStock
    public function index(){
      $this->data['products'] = Product::all();

      return view('product.stock', $this->data);
    }
}
