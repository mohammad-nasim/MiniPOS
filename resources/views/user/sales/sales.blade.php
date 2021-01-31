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
                <th>Total</th>
                <th>Date</th>
                <th>Actions</th>

            </tr>
            </thead>

            <tbody>
                <?php
                   $grandTotal = 0;
                ?>
            @foreach($show->sales as $key => $saleinvoice)
            <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $show->name}}</td>
                <td>{{ $saleinvoice->chalan_no}}</td>
                <td>{{ $saleinvoice->note}}</td>
                <td>
                <?php
                    $item = $saleinvoice->saleitems()->sum('quantity');
                    $total = $saleinvoice->saleitems()->sum('total');
                    $grandTotal += $total;
                    echo $total;
                ?>
                </td>
                <td>{{ $saleinvoice->date}}</td>


                <td class="text-right" >
                    <form action="{{ route('user.sale.invoice.destroy',
                    ['id' => $show->id , 'saleinvoice_id' => $saleinvoice->id ])}}
                    " method="post">

                    <a href="{{ route('user.sale.invoice.details',
                    ['id' => $show->id,'saleinvoice_id' => $saleinvoice->id] )}}" class="btn btn-primary btn-sm">  <i class=" fa fa-eye "></i> </a>

                    @if ($item == 0)

                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Are you Sure?')" type="submit " class="btn btn-danger btn-sm"> <i class=" fa fa-trash "></i> </button>

                    @endif

                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>

            <tfoot>
                <tr>

                    <th colspan="4" class="text-right">Total</th>
                    <th>{{ $grandTotal }} TK</th>
                    <th colspan="2"></th>


                </tr>
                </tfoot>
        </table>
    </div>
</div>
@endsection
