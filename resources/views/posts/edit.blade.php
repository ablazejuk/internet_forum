@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Post on Thread {{ $post->thread->title }} (last update at {{ date('d/m/Y - H:i:s', strtotime($post->updated_at)) }})</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('posts/edit') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="box-body">
                    @if($errors->has('message'))
                        <div class="col-md-offset-1 text-danger">{{ $errors->first('message') }}</div>
                        <br>
                    @endif

                    <div class="form-group row {{ $errors->has('message') ? 'has-error' : '' }}">
                        <div class="col-md-offset-1 col-md-10">
                            <textarea class="textarea" name="message" id="description" placeholder="Message" 
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('message', $post->message) }}</textarea>                      
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('threads/view/' . $post->thread->id) }}" class="btn btn-default margin" role="button">Return</a>
                    <button type="submit" class="btn btn-primary margin">Edit</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
