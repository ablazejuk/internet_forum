@extends('layouts.app')

@section('title', 'Create Account')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Create New Account</h3>
            </div><!-- /.box-header -->
            <form method="POST" action="{{ url('accounts/create') }}">
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
                    
                    <div class="form-group row">
                        <div class="col-md-offset-3 col-md-6">
                            <label>Type*</label>
                            <select class="form-control" name="type">
                                @foreach($types as $type)
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('accounts') }}" class="btn btn-default margin" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary margin">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
