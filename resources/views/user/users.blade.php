@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Users List</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('users.create')}}" class="btn btn-info "> <i class="fa fa-plus-circle"></i> Create New User</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>


                    <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $user->group->title}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->address}}</td>
                        <td class="text-right" >

                        <form action="{{ route('users.destroy', $user->id )}}
                        " method="post">

                        <a href="{{ route('users.show', $user->id)}}" class="btn-sm btn-primary"><i class="fa fa-eye "></i> </a>

                        <a href="{{ route('users.edit', $user->id)}}" class="btn-sm btn-success"><i class="fa fa-edit "></i> </a>
                        @csrf
                        @method('DELETE')
                        @if(
                        $user->sales()->count() == 0 &&
                        $user->purchase()->count() == 0 &&
                        $user->payment()->count() == 0 &&
                        $user->receipts()->count() == 0
                        )
                            <button onclick="return confirm('Are you Sure?')" type="submit " class=" text-light btn-sm btn-danger"><i class=" fa fa-trash "></i></button>
                        @endif
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
