@extends('user.layout.layout')
@section('back')
    <div class="col-md-3">
        <h1 class="h3 mb-4 text-gray-800">
            <a href="{{ route('users.show', $user->id)}}" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Back</a>
        </h1>

    </div>
@endsection
@section('show.user')
<div class="card-body">
    <div class="mb-4 h4">
     Payment Details of <strong> {{$user->name}} </strong>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Admin</th>
                <th>Amout</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>

                <th colspan="3" class="text-right">Total : </th>
                <th>{{ $show->payment()->sum('amount')}} TK</th>
                <th colspan="3"></th>

            </tr>
            </tfoot>


            <tbody>
            @foreach($show->payment as $key => $paymentinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ ($paymentinvoice->admin_id)? $paymentinvoice->admin->name : ""}}</td>
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











@endsection
