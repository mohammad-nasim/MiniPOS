@extends('layouts.main')

@section('content')
<div class="row clearfix mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Edit New Groups</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('group-view')}}" class="btn btn-secondary "> Back</a>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <form action="{{ route('group-update', $editGroup->id) }}" method="post" >
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Edit Group Name</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $editGroup->title }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@stop