@extends('user.layout.layout')

@section('show.user')
<div class="card-body">
  <div class="mb-4 h4">
    Receipt Details of <strong> {{$user->name}} </strong>
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
                <th>{{$show->receipts()->sum('amount')}} TK</th>
                <th colspan="3"></th>
                
            </tr>
            </tfoot>

            
            <tbody>
            @foreach($show->receipts as $key => $receiptsinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ optional($receiptsinvoice->admin)->name}}</td>
                <td>{{ $receiptsinvoice->amount}} TK</td>
                <td>{{ $receiptsinvoice->note}}</td>
                <td>{{ $receiptsinvoice->date}}</td>
        
                <td class="text-right" >                            
                  <form action="{{ route('user.receipts.destroy',
                    ['id' => $show->id, 'receipts_id' => $receiptsinvoice->id ] )}}
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

{{-- Modal for adding new receipts --}}











@endsection