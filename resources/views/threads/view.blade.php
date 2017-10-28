@extends('layouts.app')

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side strech">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Thread
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="box container">
            <div class="box-header">
                <div class="row">
                    <h3 class="box-title col-md-1"><i class="fa fa-comments-o"></i>Posts</h3>
                    <h3 class="text-center col-md-10">{{ $thread->title }}</h3>
                </div>
                
                @if($thread->description)
                    <hr>
                    <p class="col-md-offset-1 col-md-10">{!! $thread->description !!}</p>
                @endif
            </div>
            <hr>
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
                        @if($post->user->id === auth()->user()->id)
                        <div class="col-md-1 tools text-center">
                            <a href="{{ url('posts/edit/' . $post->id) }}" title="Edit"><i class="fa fa-edit fa-2x"></i></a>
                            <a href="{{ url('posts/delete/' . $post->id) }}" title="Delete"><i class="fa fa-trash-o fa-2x"></i></a>
                        </div>
                        @endif
                    </div><!-- /.item -->
                    @if($post->created_at != $post->updated_at)
                    <small class="pull-right text-muted">
                        Last edit at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }}
                    </small>
                    @endif
                @endforeach
            </div><!-- /.chat -->
            <div class="box-footer">
                <form action="{{ url('posts/create') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    
                    @if($errors->has('message'))
                        <div class="col-md-offset-1 text-danger">{{ $errors->first('message') }}</div>
                        <br>
                    @endif
                    
                    <div class="form-group row {{ $errors->has('message') ? 'has-error' : '' }}">
                        <div class="col-md-offset-1 col-md-9">
                            <textarea class="textarea" name="message" id="description" placeholder="Message" 
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('message') }}</textarea>                      
                        </div>
                        <div class="col-md-1" style="padding-top:120px">
                            <button class="btn btn-success">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.box -->
    </section><!-- /.content -->
</aside>

@endsection
