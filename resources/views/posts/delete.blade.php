@extends('layouts.app')

@section('title', 'Delete Post')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Delete Post on Thread {{ $post->thread->title }}</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('posts/delete') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="box-body">
                    <p class="text-center">Are you sure you want to delete this post?</p>

                    <hr>

                    <div class="row">
                        <div class="name col-md-2 text-center">
                            {{ $post->user->name }}
                        </div>
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
                    </div>
                    @if($post->created_at != $post->updated_at)
                    <div class="row">
                        <div class="col-md-offset-9 col-md-3 text-center">
                            <small class="text-muted">
                                Last edit at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }}
                            </small>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('threads/view/' . $post->thread->id) }}" title="Cancel" class="btn btn-default margin" role="button">Cancel</a>
                    <button title="Delete" type="submit" class="btn btn-danger margin">Delete</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
