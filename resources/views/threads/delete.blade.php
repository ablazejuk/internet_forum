@extends('layouts.app')

@section('title', 'Delete Thread')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Delete Thread {{ $thread->title }}</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('threads/delete') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="thread_id" value="{{ $thread->id }}">

                <div class="box-body">
                    <p class="text-center">Are you sure you want to delete this thread? Its posts will also be deleted.</p>

                    <hr>

                    <div class="row">
                        <h2 class="text-center">{{ $thread->title }}</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <small class="pull-left text-muted">
                                Created at {{ date('d/m/Y - H:i:s', strtotime($thread->created_at)) }}
                            </small>

                            @if($thread->created_at != $thread->updated_at)
                            <small class="pull-right text-muted">
                                Last edit at {{ date('d/m/Y - H:i:s', strtotime($thread->updated_at)) }}
                            </small>
                            @endif
                        </div>
                    </div>

                    @if($thread->description)
                    <div class="row">
                        <hr>
                        <h4 class="text-center">Description</h4>
                        <div class="col-md-offset-1 col-md-10">{!! $thread->description !!}</div>
                    </div>
                    @endif
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('threads/view/' . $thread->id) }}"  title="Return" class="btn btn-default margin" role="button">Return</a>
                    <button  title="Delete" type="submit" class="btn btn-danger margin">Delete</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
