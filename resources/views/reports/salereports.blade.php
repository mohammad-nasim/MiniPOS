@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-5">
            <h1 class="h3 mb-4 text-gray-800">Sale Reports </h1>
        </div>
        <div class="col-md-7 text-right">
            {!! Form::open(['route' => 'reports.sale', 'method' => 'get']) !!}
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    {{ Form::date('start_date', $start_date, ['class' => 'form-control mb-3', 'placeholder' => 'Start Date', 'id' => 'start_date'])}}
                  </div>
                  <div class="col-auto">

                    {{ Form::date('end_date', $end_date, ['class' => 'form-control mb-3', 'placeholder' => 'End Date', 'id' => 'end_date'])}}
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 ">Search</button>
                  </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Report from <strong class="text-danger">{{ $start_date }}</strong>  TO <strong class="text-danger">{{ $end_date }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Products</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($salereports as $key => $sale)
                    <tr>
                        <td>{{ optional($sale)->date }}</td>
                        <td>{{ $sale->product->title }}</td>
                        <td  class="text-center" >{{ $sale->quantity }}</td>
                        <td class="text-right">{{ $sale->price }}</td>
                        <td class="text-right">{{ $sale->total }}</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right">Quantity:</th>
                            <th class="text-center">{{ $salereports->sum('quantity') }} Pcs.</th>
                            <th class="text-right" >Total:</th>
                            <th class="text-right">{{ $salereports->sum('total') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
