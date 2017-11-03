@extends('layouts.app')

@section('title', 'Delete Account')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Delete Account {{ $user->name }}</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('accounts/delete') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="box-body">
                    <p class="text-center">Are you sure you want to delete this account? Its threads and posts will also be deleted.</p>

                    <hr>

                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-4">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <label>E-mail Address</label>
                        </div>
                        <div class="col-md-4">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <label>Type</label>
                        </div>
                        <div class="col-md-4">
                            {{ ucfirst($user->type) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <label>Threads</label>
                        </div>
                        <div class="col-md-4">
                            {{ $user->threads->count() }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <label>Posts</label>
                        </div>
                        <div class="col-md-4">
                            {{ $user->posts->count() }}
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('accounts/edit/' . $user->id) }}"  title="Cancel" class="btn btn-default margin" role="button">Cancel</a>
                    <button  title="Delete" type="submit" class="btn btn-danger margin">Delete</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
