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
                <!-- chat item -->
                <div class="row">
                    <a href="#" class="name col-md-2 text-center">
                        Mike Doe
                    </a>
                    <p class="message col-md-9">
                        I would like to meet you to discuss the latest news about
                        the arrival of the new theme. They say it is going to be one the
                        best themes on the market
                    </p>
                    <small class="text-muted col-md-1 pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                </div><!-- /.item -->
            </div><!-- /.chat -->
            <div class="box-footer">
                <form action="{{ url('posts/create') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    
                    @if($errors->has('post'))
                        <div class="col-md-offset-1 text-danger">{{ $errors->first('post') }}</div>
                        <br>
                    @endif
                    
                    <div class="form-group row {{ $errors->has('post') ? 'has-error' : '' }}">
                        <div class="col-md-offset-1 col-md-9">
                            <textarea class="textarea" name="post" id="description" placeholder="Post" 
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('post') }}</textarea>                      
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
