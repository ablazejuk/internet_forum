@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Register New Account</h3>
            </div><!-- /.box-header -->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="name" class="control-label">Name*</label>
                            <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
                        </div>

                        <div class="col-md-3">
                            @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="email" class="control-label">E-Mail Address*</label>
                            <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="col-md-3">
                            @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="password" class="control-label">Password*</label>
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                        <div class="col-md-3">
                            @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="password-confirm" class="control-label">Confirm Password*</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <div class="row">
                        <button type="submit" title="Sign me up" class="btn btn-primary margin">Sign me up</button>
                    </div>
                    <div class="row">
                        <a href="{{ url('login') }}" title="Login" class="text-center">I already have a membership</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
