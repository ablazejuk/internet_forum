@extends('layouts.app')

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side strech">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Threads</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('threads/create') }}" class="btn btn-primary btn-sm pull-right margin" role="button">
                                    Create New Thread
                                </a>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="threads-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Posts</th>
                                    <th>Last Post</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($threads as $thread)
                                <tr>
                                    <td><a href="{{ url('threads/view/' . $thread->id) }}">{{ $thread->title }}</a></td>
                                    <td>{{ $thread->user->name }}</td>
                                    <td>Win 95+</td>
                                    <td>Win 95+</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>

@endsection
