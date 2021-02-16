<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Product';
        $this->data['sub_menu'] = 'product';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('category.categories', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "Add New Category";
        $this->data['mode']  = 'create';
        return view('category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

       $data = new Category();
       $group_title = $request->title;
       $data->title = $group_title;

        if($data->save()){
            session::flash('message-success', 'Category Created Successfully');
            return redirect()->route('categories.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['title'] = "Update Category";
        $this->data['data'] = Category::findorfail($id);
        $this->data['mode']  = 'edit';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
       $title = $request->title;

       $category = Category::findorfail($id);
       $category->title = $title;

       if($category->save()){
        session::flash('message-success', 'Category Updated Successfully');
        return redirect()->route('categories.index');
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
        $category = Category::findorfail($id);

        if($category->delete()){
            session::flash('message-danger', 'Category Deleted Successfully');
            return redirect()->route('categories.index');
        }
    }
}
