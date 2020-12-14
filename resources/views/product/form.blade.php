@extends('layouts.main')

@section('content')
<div class="row clearfix mb-4">
        <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.create')}}" class="btn btn-secondary "> Back</a>
        </div>
    </div>

    <div class="card mt-5 row">
        <div class="card-body col-md-8 offset-md-2">
            @if($mode == 'edit')
                {!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'put']) !!}
            @else
                {!! Form::open(['route' => 'product.store', 'method' => 'post']) !!}
            @endif          
                    {{Form::label('category', 'Product Category', ['class' => 'col-form-label'])}}                  
                    {{Form::select('category_id', $category, NULL, ['class' => 'form-control mb-3 mt-2','id' => 'title', 'placeholder' => 'Enter a category'])}} 
                    
                    {{ Form::label('title', 'Title')}} 
                    {{ Form::text('title', NULL, ['class' => 'form-control mb-3', 'placeholder' => 'Enter A Title', 'id' => 'title'])}}

                    {{ Form::label('desc', 'Description')}} 
                    {{ Form::textarea('description', NULL, ['class' => 'form-control mb-3', 'placeholder' => 'Write a description..', 'id' => 'title'])}}

                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('cost_price', 'Cost Price')}} 
                            {{ Form::text('cost_price', NULL, ['class' => 'form-control mb-3', 'placeholder' => 'Enter the cost price', 'id' => 'cost_price'])}}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('price', 'Price')}} 
                            {{ Form::text('price', NULL, ['class' => 'form-control mb-3', 'placeholder' => 'Enter the Price', 'id' => 'price'])}}
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-primary mt-3">Submit</button>

                {!! Form::close() !!}
            
            <br>
        </div>
    </div>
@stop
