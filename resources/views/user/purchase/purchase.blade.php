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
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Chalan No.</th>
                <th>Total Items</th>
                <th>Total Purchase</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php
                $grandTotal = 0;
                $totalItem   = 0;
            ?>
            <tbody>
            @foreach($purchase->purchase as $key => $purchaseinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $show->name}}</td>
                <td>{{ $purchaseinvoice->chalan_no}}</td>
                <td>
                    <?php
                       //echo $totalItem . "-";
                       echo  $items = $purchaseinvoice->purchaseitem()->sum('quantity');
                        $totalItem += $items;
                    ?>
                </td>
                <td>
                    <?php
                       echo $total = $purchaseinvoice->purchaseitem()->sum('total');
                        $grandTotal +=$total;
                    ?>
                </td>
                <td>{{ $purchaseinvoice->note}}</td>
                <td>{{ $purchaseinvoice->date}}</td>

                <td class="text-right" >
                    <form action="{{ route('user.purchase.invoice.destroy', ['id' => $show->id , 'purchaseinvoice_id' => $purchaseinvoice->id ] )}}
                    " method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('user.purchase.invoice.details', ['id' => $show->id, 'purchaseinvoice_id' => $purchaseinvoice->id])}}" class="btn btn-primary btn-sm">  <i class=" fa fa-eye "></i> </a>

                    <button onclick="return confirm('Are you Sure?')" type="submit " class="btn btn-danger btn-sm"> <i class=" fa fa-trash "></i> </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>

                    <th colspan="3"></th>
                    <th>{{ $totalItem }} Peice</th>
                    <th>{{ $grandTotal }} TK</th>
                    <th colspan="3"></th>

                </tr>
                </tfoot>
        </table>
    </div>
</div>
@endsection
