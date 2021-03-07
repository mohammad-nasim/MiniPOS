@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-5">
            <h1 class="h3 mb-4 text-gray-800">Day Reports </h1>
        </div>
        <div class="col-md-7 text-right">
            {!! Form::open(['route' => 'reports.day', 'method' => 'get']) !!}
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

    <!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Sale</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $salereports->sum('total') }}
              </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Receipts</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $receiptreports->sum('amount') }} TK</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Purchase</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $purchasereports->sum('total') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Payments</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paymentreports->sum('amount') }} TK</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- SaletReports -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Sales Report from <strong class="text-danger">{{ Carbon\Carbon::parse($start_date)->toFormattedDateString() }}</strong>  TO <strong class="text-danger">{{ Carbon\Carbon::parse($end_date)->toFormattedDateString() }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>

                        <th>Products</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($salereports as $key => $sale)
                    <tr>

                        <td>{{ $sale->title }}</td>
                        <td  class="text-center" >{{ $sale->quantity }}</td>
                        <td class="text-right">{{ number_format($sale->price, 2) }}</td>
                        <td class="text-right">{{ number_format($sale->total, 2) }}</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" class="text-right"></th>
                            <th class="text-center">{{ $salereports->sum('quantity') }} Pcs.</th>
                            <th class="text-right" ></th>
                            <th class="text-right">{{ $salereports->sum('total') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- PurchasetReports -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Purchase Report from <strong class="text-danger">{{ Carbon\Carbon::parse($start_date)->toFormattedDateString()  }}</strong>  TO <strong class="text-danger">{{ Carbon\Carbon::parse($end_date)->toFormattedDateString()  }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Products</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchasereports as $key => $purchase)
                    <tr>
                        <td>{{ $purchase->title }}</td>
                        <td  class="text-center" >{{ $purchase->quantity }}</td>
                        <td class="text-right">{{  number_format($purchase->price, 2) }}</td>
                        <td class="text-right">{{  number_format($purchase->total, 2) }}</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" class="text-right"></th>
                            <th class="text-center">{{ $purchasereports->sum('quantity') }} Pcs.</th>
                            <th class="text-right" ></th>
                            <th class="text-right">{{ $purchasereports->sum('total') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- ReceipetReports -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Receipt Report from <strong class="text-danger">{{ Carbon\Carbon::parse($start_date)->toFormattedDateString() }}</strong>  TO <strong class="text-danger">{{ Carbon\Carbon::parse($end_date)->toFormattedDateString() }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center" >User</th>
                        <th class="text-right">Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($receiptreports as $key => $receipt)
                    <tr>
                        <td class="text-center">{{ $receipt->user->name }}</td>
                        <td  class="text-right" >{{ $receipt->amount }} TK</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th class="text-center">User</th>
                            <th class="text-right">{{ $receiptreports->sum('amount') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- PaymentReports -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Payment Report from <strong class="text-danger">{{ Carbon\Carbon::parse($start_date)->toFormattedDateString() }}</strong>  TO <strong class="text-danger">{{ Carbon\Carbon::parse($end_date)->toFormattedDateString() }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center" >User</th>
                        <th class="text-right">Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paymentreports as $key => $payment)
                    <tr>
                        <td class="text-center">{{ $payment->user->name }}</td>
                        <td  class="text-right" >{{ $payment->amount }} TK</td>

                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">User</th>
                            <th class="text-right">{{ $paymentreports->sum('amount') }}TK</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop
