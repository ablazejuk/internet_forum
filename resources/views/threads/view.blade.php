@extends('layouts.app')

@section('title', 'View Thread')

@section('content')

<div class="box container">
    <div class="box-header">
        <div class="row">
            <h3 class="box-title col-md-2"><i class="fa fa-comments-o"></i>Posts</h3>
            <h2 class="text-center col-md-8">{{ $thread->title }}</h2>
            @if(\Auth::check() && $thread->user->id === auth()->user()->id)
            <div class="col-md-2 text-right">
                <a href="{{ url('threads/edit/' . $thread->id) }}" title="Edit" class="btn btn-primary btn-sm margin" role="button">
                    Edit
                </a>
                <a href="{{ url('threads/delete/' . $thread->id) }}" title="Delete"  class="btn btn-danger btn-sm margin" role="button">
                    Delete
                </a>
            </div>
            @endif
        </div>

        <small class="pull-left text-muted">
            Created by {{ $thread->user->name }} at {{ date('d/m/Y - H:i:s', strtotime($thread->created_at)) }}
        </small>

        @if($thread->created_at != $thread->updated_at)
        <small class="pull-right text-muted">
            Last edit at {{ date('d/m/Y - H:i:s', strtotime($thread->updated_at)) }}
        </small>
        @endif

        @if($thread->description)
        <hr>
        <h4 class="text-center">Description</h4>
        <div class="col-md-offset-1 col-md-10">{!! $thread->description !!}</div>
        @endif
    </div>
    @if($thread->posts->count())
    <hr>
    @endif
    <div class="box-body" id="chat-box">
        @foreach($thread->posts as $key => $post)
            @if($key)
            <hr>
            @endif
            <!-- chat item -->
            <div class="row">
                <a href="#" class="name col-md-2 text-center">
                    {{ $post->user->name }}
                </a>
                <div class="message col-md-8"> 
                    {!! $post->message !!}
                </div>
                <div class="col-md-1 text-center">
                    <div class="row">
                        <small class="text-muted">
                            <i class="fa fa-calendar-o"></i> 
                            {{ date('d/m/Y', strtotime($post->created_at)) }}
                        </small>
                    </div>
                    <div class="row">
                        <small class="text-muted">
                            <i class="fa fa-clock-o"></i> 
                            {{ date('H:i:s', strtotime($post->created_at)) }}
                        </small>
                    </div>
                </div>
                @if(\Auth::check() && $post->user->id === auth()->user()->id)
                <div class="col-md-1 tools text-center">
                    <a href="{{ url('posts/edit/' . $post->id) }}" title="Edit" style="vertical-align:middle"><i class="fa fa-edit fa-2x"></i></a>
                    <a href="{{ url('posts/delete/' . $post->id) }}" title="Delete"><i class="fa fa-trash-o fa-2x"></i></a>
                </div>
                @endif
            </div><!-- /.item -->
            @if($post->created_at != $post->updated_at)
            <div class="row">
                <div class="col-md-offset-9 col-md-3 text-center">
                    <small class="text-muted">
                        Last edit at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }}
                    </small>
                </div>
            </div>
            @endif
        @endforeach
    </div><!-- /.chat -->
    @if(\Auth::check())
    <div class="box-footer">
        <form action="{{ url('posts/create') }}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="thread_id" value="{{ $thread->id }}">

            <div class="form-group row {{ $errors->has('message') ? 'has-error' : '' }}">
                <div class="col-md-offset-2 col-md-8">
                    <textarea class="textarea" name="message" id="description" placeholder="Message" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('message') }}</textarea>                      
                </div>
                <div class="col-md-2">
                    @if($errors->has('message'))
                    <div class="text-danger">{{ $errors->first('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="row text-center">
                <a href="{{ url('home') }}" title="Return" class="btn btn-default margin" role="button">Return</a>
                <button type="submit" title="Post" class="btn btn-primary margin">Post</button>
            </div>
        </form>
    </div>
    @endif
</div><!-- /.box -->

@endsection
