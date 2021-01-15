@extends('layouts.primary')

@section('primary.content')

    <div class="card mt-5">
        <div class="card-body">
            <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">            
                  <div class="col-xl-10 col-lg-12 col-md-9">           
                    <div class="card o-hidden border-0 shadow-lg my-5">
                      <div class="card-body p-0">
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
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                          <div class="col-lg-6">
                            <div class="p-5">
                              <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
                              </div>
                              {!! Form::open(['route' => 'login.confirm', 'method' => 'post' , 'class' => 'user']) !!}
                             
                                <div class="form-group">
                                    {{Form::text('email', NULL, ['class' => 'form-control form-control-user', 'id' => 'email', 'placeholder' => 'Enter Email Address...'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::password ('password', ['class' => 'form-control form-control-user', 'id' => 'password', 'placeholder' => 'Enter Your Password'])}}
                                </div>

                                <div class="form-group">
                                  <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                  </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                                                             
                                {!! Form::close() !!}

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>            
                  </div>           
                </div>            
              </div>            
        </div>
    </div>
@stop