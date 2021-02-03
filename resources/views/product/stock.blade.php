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
                        <th>Total Purchase</th>
                        <th>Total Sale</th>
                        <th class="text-danger">Stock</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Total Purchase</th>
                        <th>Total Sale</th>
                        <th class="text-danger">Stock</th>

                    </tr>
                    </tfoot>


                    <tbody>
                    @foreach($products as $key => $data)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $data->category->title}}</td>
                        <td>{{ $data->title}}</td>
                        <td>{{ $totalPurchase = $data->purchesitems->sum('quantity')}}</td>
                        <td>{{ $totalSale = $data->saleitems->sum('quantity')}}</td>
                        <td>{{ $totalPurchase - $totalSale }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
