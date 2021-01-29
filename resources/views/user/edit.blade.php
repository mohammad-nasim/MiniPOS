@extends('layouts.main')

@section('content')
<div class="row clearfix mb-4">
        <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800"><span class="text-success">Update</span> <strong>{{ $show->name }}'s</strong> Information</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('group-view')}}" class="btn btn-secondary "> Back</a>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form class="align-items-center" action="{{ route('users.update', $show->id) }}" method="post" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Select Group <span class="text-danger">*</span> </label>

                            <select name="group_id" class="custom-select my-1 mr-sm-2" id="">
                            <option selected>Select Group</option>
                                @foreach($groups as $key => $data)
                                <option  value="{{ $key }}" {{( $key == $show->group_id ) ? 'selected': '' }} >{{$value="$data"}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$show->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email <span class="text-danger">*</span> </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$show->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$show->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$show->address}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
