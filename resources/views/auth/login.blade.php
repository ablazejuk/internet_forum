@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Login</h3>
            </div><!-- /.box-header -->
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="email" class="control-label">E-Mail Address*</label>
                            <input id="email" type="email" class="form-control" placeholder="E-mail Address" name="email" value="{{ old('email') }}" autofocus>
                        </div>
                        
                        <div class="col-md-3">
                            @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="password" class="control-label">Password*</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        
                        <div class="col-md-3">
                            @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('remember_me') ? ' has-error' : '' }}">
                        <div class="col-md-offset-5 col-md-2 text-center">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember_me"/> 
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <div class="row">
                        <button type="submit" title="Sign me in" class="btn btn-primary margin">Sign me in</button>  
                    </div>
                    <div class="row">
                        <a href="#" title="Recover Password">I forgot my password</a>
                    </div>
                    <div class="row">
                        <a href="{{ url('register') }}" title="Register" class="text-center">Register a new membership</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
