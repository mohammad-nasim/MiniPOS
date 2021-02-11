@extends('user.layout.invoicelayout')
@section('backfrominvoice')
    <div class="col-md-3">
        <h1 class="h3 mb-4 text-gray-800">
            <a href="{{ route('user.purchase', $show->id)}}" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Back</a>
        </h1>
    </div>
@endsection
@section('show.user')

<div class="card" id="printableArea">
    <div class="card-body">
        <div class="mb-3">
        <span class="h5">Purchase <strong class="text-danger">Invoice Details</strong> </span>
        <hr>
        </div>
        <div class="mt-3">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <span> <strong> Name </strong>   : {{ $user->name }}   </span>  <br>
                    <span> <strong> Email </strong>  : {{ $user->email}}   </span>  <br>
                    <span> <strong> Phone </strong>  : {{ $user->phone }}  </span>  <br>
                    <span> <strong> Address </strong>: {{ $user->address}} </span>  <br>

                </div>
                <div class="col-md-4">
                    <span><strong> Date  </strong> : {{ Carbon\Carbon::parse($invoice->date)->toFormattedDateString() }}<br>
                    <span><strong> Challan No.</strong> : {{ $invoice->chalan_no }}
                </div>
            </div>
            <div class="invoice_items mt-4">
                <table class="table">
                    <thead >
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Action</th>
                    </thead>
                    <tbody >
                        @foreach ($invoice->purchaseitem as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->title}}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="text-right">{{ $item->total }} </td>
                            <td class="text-right">
                                <form action="{{
                                    route('user.invoice.deletepurchaseitem',
                                    ['id' => $show->id, 'purchaseinvoice_id' => $invoice->id , 'item_id' => $item->id] )}}
                                    " method="post">
                                    @csrf
                                    @method('DELETE')

                                    <!-- Button trigger modal -->
                                    <button onclick=" return confirm('Are want to delete') " type="submit" class="btn btn-danger" >
                                    <i class=" fa fa-trash "></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#additem">
                                <i class="fa fa-plus-circle"></i>Add Product
                              </button>
                        </th>
                        <th colspan="3" class="text-right">Total : </th>
                        <th class="text-right">
                        <?php
                           echo $totalPurchase = $invoice->purchaseitem->sum('total')
                        ?> TK</th>
                        <th colspan="1"></th>
                    </tr>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#newreceiptsfromInvoice">
                                <i class="fa fa-plus-circle"></i>Add Payment
                              </button>
                        </th>
                        <th colspan="3" class="text-right">Paid : </th>
                        <th class="text-right"> {{$totalPay = $invoice->payment()->sum('amount') }} TK</th>
                        <th colspan="1"></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Due :</th>
                        <th class="text-danger text-right">{{ $totalPurchase - $totalPay }} TK</th>
                        <th colspan="1"></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

     {{-- Modal for Add Items --}}

  <!-- Modal -->
  <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open
        (['route' => ['user.purchaseinvoice.additems', ['id' =>$show->id, 'purchaseinvoice_id' => $invoice->id ] ], 'method' => 'post' , 'class' => 'user']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="additemLabel">Add New Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-sm-3 text-right" >
                    <label for="product_id" > Product <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                {{Form::select('product_id', $product, NULL, ['class' => 'form-control ', 'id' => 'product_id', 'placeholder' => 'Select a product', 'required'] )}}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 text-right" >
                    <label for="quantity" > Price <span class="text-danger">*</span>  </label>
                </div>
                <div class="col-sm-9">
                {{Form::text ('price', NULL,  ['class' => 'form-control ', 'id' => 'price', 'placeholder' => 'Enter product price', 'required'])}}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 text-right" >
                    <label for="quantity" > Quantity <span class="text-danger">*</span> </label>
                </div>
                <div class="col-sm-9">
                {{Form::text('quantity', NULL, ['class' => 'form-control ', 'id' => 'quantity', 'placeholder' => 'Enter product quantity', 'required'] )}}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3 text-right" >
                    <label for="total" > Total <span class="text-danger">*</span> </label>
                </div>
                <div class="col-sm-9">
                {{Form::text ('total', NULL, ['class' => 'form-control ', 'id' => 'total', 'rows' => '3',  'placeholder' => 'Enter total amount'])}}
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>

  {{-- Modal for adding new Payment --}}

  <!-- Modal -->
  <div class="modal fade" id="newreceiptsfromInvoice" tabindex="-1" role="dialog" aria-labelledby="newreceiptsfromInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.payment.store', ['id' => $show->id, 'purchaseinvoice_id' => $invoice->id]  ], 'method' => 'post' , 'class' => 'user']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newreceiptsfromInvoiceLabel">Add Payment for this Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {{Form::date('date', NULL, ['class' => 'form-control ', 'id' => 'date', 'placeholder' => 'Enter date Address...', 'required'] )}}
            </div>
            <div class="form-group">
                {{Form::text ('amount', NULL,  ['class' => 'form-control ', 'id' => 'amount', 'placeholder' => 'Enter Your amount', 'required'])}}
            </div>
            <div class="form-group">
                {{Form::textarea ('note',NULL, ['class' => 'form-control ', 'id' => 'note', 'rows' => '3',  'placeholder' => 'Enter Your note'])}}
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
      </div>

      {!! Form::close() !!}
    </div>
  </div>















@endsection

