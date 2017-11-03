@extends('layouts.app')

@section('title', 'Edit Account')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Edit Account</h3>
                    </div>
                    @if(Auth::check())
                    <div class="col-md-6">
                        <a href="{{ url('accounts/delete/' . $user->id) }}" title="Delete Account" class="btn btn-danger btn-sm pull-right margin" role="button">
                            Delete Account
                        </a>
                    </div>
                    @endif
                </div>
            </div><!-- /.box-header -->
            <form action="{{ url('accounts/edit') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <div class="box-body">
                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name" maxlength="255" placeholder="Name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="email">E-mail Address*</label>
                            <input type="text" class="form-control" name="email" maxlength="255" placeholder="E-mail Address" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('new_password') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" name="new_password" maxlength="255" placeholder="New Password" value="">
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('new_password'))
                                <div class="text-danger">{{ $errors->first('new_password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="new_password_confirmation">New Password Confirmation</label>
                            <input type="password" class="form-control" name="new_password_confirmation" maxlength="255" placeholder="New Password Confirmation" value="">
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('new_password_confirmation'))
                                <div class="text-danger">{{ $errors->first('new_password_confirmation') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-3 col-md-6">
                            <label>Type*</label>
                            <select class="form-control" name="type">
                                @foreach($types as $type)
                                <option value="{{ $type }}" <?php echo ($type == $user->type ? 'selected' : '') ?>>{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('accounts') }}" title="Cancel" class="btn btn-default margin" role="button">Cancel</a>
                    <button type="submit" title="Apply Changes" class="btn btn-primary margin">Apply Changes</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
