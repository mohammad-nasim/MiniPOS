<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailsRequest;
use App\Product;
use Illuminate\Http\Request;
use Session;
class MainProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();

        return view('product.product', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category'] = Category::arrForSelect();
        $this->data['title'] = "Create Product Item";
        $this->data['mode']  = "create";
        return view('product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDetailsRequest $request)
    {
        $formData = $request->all();

        if(Product::create($formData)){  
            session::flash('message-success', 'Product Created Successfully');
            return redirect()->route('product.index');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['findID'] = Product::findorfail($id);

        return view('product.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']  = Product::find($id);
        $this->data['category'] = Category::arrForSelect();
        $this->data['title']    = " Update Prouct Details";
        $this->data['mode']     = "edit";

        return view('product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductDetailsRequest $request, $id)
    {
        $allData = $request->all();

        $updateProduct = Product::findorfail($id);
        $updateProduct->category_id  = $allData['category_id'];
        $updateProduct->title        = $allData['title'];
        $updateProduct->description  = $allData['description'];
        $updateProduct->cost_price   = $allData['cost_price'];
        $updateProduct->price        = $allData['price'];

        if($updateProduct->save()){
            session::flash('message-success', 'Product Updated Successfully');
            return redirect()->route('product.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Product::find($id)->delete()){  
            session::flash('message-danger', 'Product Deleted Successfully');
            return redirect()->route('product.index');
            
        }
    }
}

