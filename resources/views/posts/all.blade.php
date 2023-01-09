@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 mt-5">
                <h1>{{ $post->title }}</h1>
                <p class="text">{{ $post->body }}</p>
                <a href="posts/{{$post->id}}">Read More</a>
            </div>
        @endforeach
    
    </div>
</div>

@endsection 
