@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <div class="blog-post"> 
            <a href="{{$post->id}}">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
            </a>

            <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by <a href="#">Jacob</a></p>
        
            {{ $post->body }}
        </div>
    </div>
@endsection