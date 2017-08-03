@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>
                <div class="panel-body">

                    @if (session('fail_status'))
                    <div class="alert alert-danger">
                        {{ session('fail_status') }}
                    </div>
                    @endif

                    <!--user registration form--> 

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" novalidate>
                        {{ csrf_field() }}

                        <!--div for user Name-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"> Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autofocus autocomplete="off">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--end div for user registration-->

                        <!-- div for email -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"> Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus autocomplete="off">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--end div for emaile-->

                        <!--div for password-->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"> Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter your password" required autofocus autocomplete="off">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--end div for password-->

                        <!--div for confirm password-->

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label"> Confirm password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Re-enter your password" required autofocus autocomplete="off">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--end div for password-->
                        <!--div register button--> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                        <!-- end div of register button--> 
                    </form>  <!-- end form-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
