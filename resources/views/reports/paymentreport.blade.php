@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-5">
            <h1 class="h3 mb-4 text-gray-800">Sale Reports </h1>
        </div>
        <div class="col-md-7 text-right">
            {!! Form::open(['route' => 'reports.payment', 'method' => 'get']) !!}
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
            <h6 class="m-0 font-weight-bold text-dark">Sales Report from <strong class="text-danger">{{ Carbon\Carbon::parse($start_date)->toFormattedDateString() }}</strong>  TO <strong class="text-danger">{{ Carbon\Carbon::parse($end_date)->toFormattedDateString() }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th class="text-center" >User</th>
                        <th class="text-right">Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paymentreports as $key => $payment)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($payment->date)->toFormattedDateString() }}</td>
                        <td class="text-center">{{ $payment->user->name }}</td>
                        <td  class="text-right" >{{ $payment->amount }} TK</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Date</th>
                            <th class="text-center">User</th>
                            <th class="text-right">{{ $paymentreports->sum('amount') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
