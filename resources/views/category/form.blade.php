@extends('layouts.main')

@section('content')
<div class="row clearfix mb-4">
        <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('group-view')}}" class="btn btn-secondary "> Back</a>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            @if($mode == 'edit')
                {!! Form::model($data, ['route' => ['categories.update', $data->id], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
            @endif          
                    {{Form::label('title', 'Category Name')}}   

                    {{Form::text('title', NULL, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Enter a category'])}}    
                    
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                {!! Form::close() !!}
            
            <br>
        </div>
    </div>
@stop