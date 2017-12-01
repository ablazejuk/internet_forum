@extends('layouts.app')

@section('title', 'Results')

@section('content')

<div class="box container">
    <div class="box-header">
        <div class="row">
            <h2 class="text-center col-md-offset-2 col-md-8"> {{ $threads->count() + $posts->count() }} result(s) for "{{ $term }}"</h2>
        </div>
    </div>
    
    <hr>
    
    <div class="box-body">
        <div class="row">
            <h3 class="text-center col-md-offset-2 col-md-8">{{ $threads->count() }} Thread(s)</h3>
        </div>

        @foreach($threads as $key => $thread)
        <hr>

        <div class="row">
            <h4 class="text-center">
                <a href="{{ url('threads/view/' . $thread->id) }}">
                    {{ $thread->title }}
                </a>
            </h4>
            <div class="message col-md-offset-1 col-md-10"> 
                {!! $thread->description !!}
            </div>
        </div>
        @endforeach
        
        <hr>
        
        <div class="row">
            <h3 class="text-center col-md-offset-2 col-md-8">{{ $posts->count() }} Post(s)</h3>
        </div>
        
        @foreach($posts as $key => $post)
        <hr>

        <div class="row">
            <h4 class="text-center">
                <a href="{{ url('threads/view/' . $post->thread->id) }}">
                    {{ $post->thread->title }}
                </a>
            </h4>
            <div class="message col-md-offset-1 col-md-10"> 
                {!! $post->message !!}
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
