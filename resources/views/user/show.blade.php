@extends('user.layout.layout')

@section('show.user')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-right ">Details of {{$show->name}}</h6>
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