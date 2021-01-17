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
                <th>Id</th>
                <th>Customer</th>
                <th>Amout</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
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
                    <form action="{{ route('product.destroy', $show->id )}}
                    " method="post">
                    @csrf 
                    @method('DELETE')
                    <a href="{{ route('product.show', $show->id)}}" class="btn btn-primary btn-sm">  <i class=" fa fa-eye "></i> </a>

                    <button onclick="return confirm('Are you Sure?')" type="submit " class="btn btn-danger btn-sm"> <i class=" fa fa-trash "></i> </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection