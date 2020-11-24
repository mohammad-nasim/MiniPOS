@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Product Category List</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('categories.create')}}" class="btn btn-info "> <i class="fa fa-plus-circle"></i> Add New Category</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>

                    
                    <tbody>
                    @foreach($categories as $key => $user)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $user->title}}</td>
                        <td class="text-left" >  
                        
                        <form action="{{ route('categories.destroy', $user->id )}}
                        " method="post">
                        @csrf 
                        @method('DELETE')  
                                                       
                                <a href="{{ route('categories.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit "></i> Edit  </a>
                                                       
                                <button onclick="return confirm('Are you Sure?')" type="submit " class=" text-light btn btn-danger"><i class=" fa fa-trash "></i> Delete</button>
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