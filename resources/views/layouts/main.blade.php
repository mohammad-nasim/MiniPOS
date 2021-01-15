@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.nav')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h2>Welcome to Dashboard</h2>
        <!-- Page Heading -->
        @if(session('message-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message-success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('message-danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message-danger')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $errorData)
                        <li>{{ $errorData }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')


    </div>
    <!-- /.container-fluid -->

@include('layouts.footer')