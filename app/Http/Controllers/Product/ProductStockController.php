<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductStockController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Product';
        $this->data['sub_menu'] = 'stock';
    }

    //ViewStock
    public function index(){
      $this->data['products'] = Product::all();

      return view('product.stock', $this->data);
    }
}
