Click here to reset your password: {{url('password/reset'.$token)}}

@extends('layout')

@section('content')

<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <div class='panel panel-default'>
                <div class='panel panel-heading'>ResetPassword</div>
                    <div class='panel-body'>
                        @if(session('status') )
                            <div class='alert alert-success'>
                            {{session('status')}}
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <strong>Whoops!</strong>There were some problems with your input.<br><br>
                            <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                            </ul>
                        </div>
                    @endif

                        <form class='form-horizontal' role='form' method='POST' action='/password/email'>
                            {{-- CSRF対策 --}}
                            <input type='hidden' name='_token' value='{{csrf_token()}}'>

                                <div class='form-group'>
                                    <label class='col-md-4 controll-label'>Email Address</label>
                                    <div class='col-md-6'>
                                        <input type='email' class='form-conrol' name='email' value='{{old('email')}}'>
                                </div>
                                    </div>

                            <div class='form-group'>
                                <div class='col-md-6 col-md-offset-4'>
                                    <button type='submit' class='btn btn-primary' >
                                    Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                </div><!-- .panel-body -->
            </div><!-- .panel -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container-fluid -->
@endsection
