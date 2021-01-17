@extends('user.layout.layout')

@section('show.user')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Chalan No.</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Chalan No.</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </tfoot>

            
            <tbody>
            @foreach($purchase->purchase as $key => $purchaseinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $show->name}}</td>
                <td>{{ $purchaseinvoice->chalan_no}}</td>
                <td>{{ $purchaseinvoice->note}}</td>
                <td>{{ $purchaseinvoice->date}}</td>
        
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