@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Products</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.index')}}" class="btn btn-info "> <i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products View</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <tbody>
                        <tr>
                            <th class="text-right">Category</th>
                            <td>{{$findID->category->title}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Title</th>
                            <td>{{$findID->title}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Description</th>
                            <td class="text-justify">{{$findID->description}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Cost Price</th>
                            <td>{{$findID->cost_price}}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Main Price</th>
                            <td>{{$findID->price}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop