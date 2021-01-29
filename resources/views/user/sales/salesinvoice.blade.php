@extends('user.layout.layout')

@section('show.user')

<div class="card">
    <div class="card-body">
        <div class="mb-3">
        <span class="h5">Sales <strong class="text-danger">Invoice Details</strong> </span>
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
                    <span><strong> Date  </strong> : {{ $invoice->date }}<br>
                    <span><strong> Challan No.</strong> : {{ $invoice->chalan_no }}
                </div>
            </div>
            <div class="invoice_items mt-4">
                <table class="table">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    <tfoot>
                        <th>
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#additem">
                                <i class="fa fa-plus-circle"></i>Add Item
                              </button>
                        </th>
                        <th colspan="3" class="text-right">Total :</th>
                        <th>{{ $invoice->saleitems->sum('total') }} TK</th>
                        <th colspan="1"></th>
                    </tfoot>
                    <tbody>
                        @foreach ($invoice->saleitems as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total }} </td>
                            <td>
                                <form action="{{
                                    route('user.invoice.deleteitem',
                                    ['id' => $show->id, 'saleinvoice_id' => $invoice->id , 'item_id' => $item->id] )}}
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
                </table>
            </div>
        </div>
    </div>
</div>

     {{-- Modal for Add Items --}}

  <!-- Modal -->
  <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.invoice.additem', ['id' =>$show->id, 'saleinvoice_id' => $invoice->id ] ], 'method' => 'post' , 'class' => 'user']) !!}
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
@endsection

