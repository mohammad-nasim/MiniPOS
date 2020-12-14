@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Products</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.create')}}" class="btn btn-info "> <i class="fa fa-plus-circle"></i> Create Product</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>

                    
                    <tbody>
                    @foreach($products as $key => $data)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $data->category->title}}</td>
                        <td>{{ $data->title}}</td>
                        <td>{{ $data->cost_price}}</td>
                        <td>{{ $data->price}}</td>
                
                        <td class="text-right" >                            
                            <form action="{{ route('product.destroy', $data->id )}}
                            " method="post">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('product.show', $data->id)}}" class="btn btn-primary btn-sm">  <i class=" fa fa-eye "></i> </a>

                            <a href="{{ route('product.edit', $data->id)}}" class="btn btn-success btn-sm">  <i class=" fa fa-edit "></i> </a>

                            <button onclick="return confirm('Are you Sure?')" type="submit " class="btn btn-danger btn-sm"> <i class=" fa fa-trash "></i> </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop