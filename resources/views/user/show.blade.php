@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-3">
            <h1 class="h3 mb-4 text-gray-800">
                <a href="{{ route('users.index')}}" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Back</a>
            </h1>
        </div>
        <div class="col-md-9 text-right">
            <a href="{{ route('users.create')}}" class="btn btn-info "> <i class="fa fa-plus-circle"></i>New Sale</a>
            <a href="{{ route('users.create')}}" class="btn btn-success "> <i class="fa fa-plus-circle"></i>New Purchase</a>
            <a href="{{ route('users.create')}}" class="btn btn-warning "> <i class="fa fa-plus-circle"></i>New Payment</a>
            <a href="{{ route('users.create')}}" class="btn btn-secondary "> <i class="fa fa-plus-circle"></i>New Receipts</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details of {{$show->name}}</h6>
        </div>
        <div class="card-body">
            <div class=" table-responsive">
               <table class="table table-striped">
                    <tr>
                        <th class="text-right">Group : </th>
                        <td>{{ $show->group->title }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Name : </th>
                        <td>{{ $show->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Email : </th>
                        <td>{{ $show->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Phone : </th>
                        <td>{{ $show->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Address : </th>
                        <td>{{ $show->address }}</td>
                    </tr>
               </table>
            </div>
        </div>
    </div>
@stop