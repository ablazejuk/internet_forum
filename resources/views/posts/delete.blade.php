@extends('layouts.app')

@section('title', 'Delete Post')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Delete Post on Thread {{ $post->thread->title }} (last update at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }})</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('posts/delete') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="box-body">
                    <p class="text-center">Are you sure you want to delete this post?</p>

                    <hr>

                    <div class="row">
                        <div class="message col-md-offset-2 col-md-8">
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
                    </div>
                    @if($post->created_at != $post->updated_at)
                    <div class="row">
                        <div class="col-md-11">
                            <small class="pull-right text-muted">
                                Last edit at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }}
                            </small>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('threads/view/' . $post->thread->id) }}" class="btn btn-default margin" role="button">Return</a>
                    <button type="submit" class="btn btn-primary margin">Delete</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
