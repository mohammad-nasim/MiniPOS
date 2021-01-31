@extends('layouts.main')

@section('content')
    <div class=" clearfix mb-4">
        <div class="col-md-3">
            <h1 class="h3 mb-4 text-gray-800">
                <a href="{{ route('user.sale', $show->id)}}" class="btn btn-primary "> <i class="fas fa-arrow-left"></i> Back</a>
            </h1>
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





@stop
