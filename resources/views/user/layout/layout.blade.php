@extends('layouts.main')

@section('content')
    <div class="row clearfix mb-4">
        <div class="col-md-3">
            <h1 class="h3 mb-4 text-gray-800">
                <a href="{{ route('users.index')}}" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Back</a>
            </h1>
        </div>
        <div class="col-md-9 text-right">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsale">
              <i class="fa fa-plus-circle"></i>New Sale
            </button>

            <a href="{{ route('users.create')}}" class="btn btn-success "> <i class="fa fa-plus-circle"></i>New Purchase</a>

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newpayment">
                <i class="fa fa-plus-circle"></i>New Payment
            </button>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newreceipts">
                <i class="fa fa-plus-circle"></i>New Receipts
            </button>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" >
                <a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{ route('users.show', $user->id)}}" >User </a>
                <a class="nav-link @if($tab_menu == 'sale') active @endif "  href="{{ route('user.sale', $show->id)}}" > Sale</a>
                <a class="nav-link @if($tab_menu == 'purchase') active @endif " href=" {{ route('user.purchase', $show->id)}} " > Purchase</a>
                <a class="nav-link @if($tab_menu == 'payment') active @endif " href=" {{ route('user.payment', $show->id)}} " > Payment</a>
                <a class="nav-link @if($tab_menu == 'receipt') active @endif " href=" {{ route('user.receipts', $show->id)}} " > Receipts</a>
            </div>
        </div>
        <div class="col-md-10">
            @yield('show.user')
        </div>
    </div>

    {{-- Modal for adding new payment --}}

  <!-- Modal -->
  <div class="modal fade" id="newpayment" tabindex="-1" role="dialog" aria-labelledby="newpaymentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.payment.store', $show->id ], 'method' => 'post' , 'class' => 'user']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newpaymentLabel">Add New Payment</h5>
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

   {{-- Modal for adding new receipts --}}

  <!-- Modal -->
  <div class="modal fade" id="newreceipts" tabindex="-1" role="dialog" aria-labelledby="newreceiptsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.receipts.store', $show->id ], 'method' => 'post' , 'class' => 'user']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newreceiptsLabel">Add New Receipts</h5>
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


     {{-- Modal for adding new Sale --}}

  <!-- Modal -->
  <div class="modal fade" id="newsale" tabindex="-1" role="dialog" aria-labelledby="newsaleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.sale.create', $show->id ], 'method' => 'post' , 'class' => 'user']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newsaleLabel">Add New Sale</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {{Form::date('date', NULL, ['class' => 'form-control ', 'id' => 'date', 'placeholder' => 'Enter date', 'required'] )}}
            </div>
            <div class="form-group">
                {{Form::text ('chalan_no', NULL,  ['class' => 'form-control ', 'id' => 'chalan_no', 'placeholder' => 'Enter challan_no', 'required'])}}
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




@stop
