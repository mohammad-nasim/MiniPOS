@extends('user.layout.layout')

@section('show.user')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Amout</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
               
                <th colspan="2" class="text-right">Total : </th>
                <th>{{ $show->payment()->sum('amount')}} TK</th>
                <th colspan="3"></th>
              
            </tr>
            </tfoot>

            
            <tbody>
            @foreach($show->payment as $key => $paymentinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $show->name}}</td>
                <td>{{ $paymentinvoice->amount}} TK</td>
                <td>{{ $paymentinvoice->note}}</td>
                <td>{{ $paymentinvoice->date}}</td>
        
                <td class="text-right" >                            
                    <form action="{{ route('user.payment.destroy',
                    ['id' => $show->id, 'payment_id' => $paymentinvoice->id ] )}}
                    " method="post">
                    @csrf 
                    @method('DELETE')

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                      <i class=" fa fa-trash "></i>
                    </button>
                     {{-- Modal for Delete Confirmation --}}

                      <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <strong class="modal-title text-danger h5 text-center" id="exampleModalLabel">Warning!</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-left">
                            Do you want to delete?
                          </div>
                          <div class="modal-footer d-flex flex-row  ">
                            <button type="button" class="p3 text-right btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class=" p3 btn btn-danger">Confitm</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
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

 







@endsection