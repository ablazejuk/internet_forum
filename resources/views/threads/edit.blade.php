@extends('layouts.app')

@section('title', 'Edit Thread')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Thread {{ $thread->title }}</h3>
            </div><!-- /.box-header -->
            <form action="{{ url('threads/edit') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="thread_id" value="{{ $thread->id }}">

                <div class="box-body">
                    <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" maxlength="100" id="title" placeholder="Title" value="{{ old('title', $thread->title) }}">
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
                        <div class="col-md-offset-3 col-md-6">
                            <label for="description">Description</label>
                            <textarea class="textarea" name="description" id="description" placeholder="Description" 
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description', $thread->description) }}</textarea>                      
                        </div>
                        <div class="col-md-3">
                            @if($errors->has('description'))
                            <div class="text-danger">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="pull-left text-muted">
                                Created at {{ date('d/m/Y - H:i:s', strtotime($thread->created_at)) }}
                            </small>
                        </div>
                        @if($thread->created_at != $thread->updated_at)
                        <div class="col-md-6">
                            <small class="pull-right text-muted">
                                Last edit at {{ date('d/m/Y - H:i:s', strtotime($thread->updated_at)) }}
                            </small>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="box-footer text-center">
                    <a href="{{ url('threads/view/' . $thread->id) }}" title="Cancel" class="btn btn-default margin" role="button">Cancel</a>
                    <button type="submit" title="Edit" class="btn btn-primary margin">Edit</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

@endsection
