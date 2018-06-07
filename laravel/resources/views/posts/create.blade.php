@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>Create a Post</h1>

        <hr>

        <form action="/posts" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" class="form-control" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @if ($errors->any())
                <div class="form-group">
                    @include('layouts.errors');
                </div>
            @endif
        </form>
    </div>
@endsection