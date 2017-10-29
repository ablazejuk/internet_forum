@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-box" id="login-box">
                <div class="header">Login</div>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="body bg-gray">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                                
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>          
                        </div>          
                        <div class="form-group{{ $errors->has('remember_me') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember_me"/> 
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                        <p><a href="#">I forgot my password</a></p>
                        <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
