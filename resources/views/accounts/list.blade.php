@extends('layouts.app')

@section('title', 'Accounts')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Accounts List</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('accounts/create') }}" title="Create New Account" class="btn btn-primary btn-sm pull-right margin" role="button">
                            Create New Account
                        </a>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Type</th>
                            <th>Threads</th>
                            <th>Posts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ url('accounts/edit/' . $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->type) }}</td>
                                <td>{{ $user->threads->count() }}</td>
                                <td>{{ $user->posts->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

@endsection
