@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">User Groups</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('group-create')}}" class="btn btn-info "> <i class="fa fa-plus-circle"></i> Create Group</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                    @foreach($groups as $key => $data)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $data->title}}</td>
                        <td class="text-right" >                            
                            <form action="{{ route('group-delete', $data->id )}}
                            " method="post">
                            @csrf 
                            @method('DELETE')
                            <a href="{{ route('group-edit', $data->id)}}" class="btn btn-success">  <i class=" fa fa-edit "></i> Edit</a>

                            <button onclick="return confirm('Are you Sure?')" type="submit " class="btn btn-danger"> <i class=" fa fa-trash "></i> Delete</button>
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