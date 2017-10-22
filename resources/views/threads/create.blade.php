@extends('layouts.app')

@section('content')

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side strech">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Thread
        </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create New Thread</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ url('threads/create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                                <div class="col-md-offset-1 col-md-7">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" name="title" maxlength="100" id="title" placeholder="Title" value="{{ old('title') }}">
                                </div>
                                <div class="col-md-4">
                                    @if($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
                                <div class="col-md-offset-1 col-md-7">
                                    <label for="description">Description</label>
                                    <textarea class="textarea" name="description" id="description" placeholder="Description" 
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>                      
                                </div>
                                <div class="col-md-4">
                                    @if($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                            <a href="{{ url('home') }}" class="btn btn-default margin" role="button">Return</a>
                            <button type="submit" class="btn btn-primary margin">Create</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>

@endsection
