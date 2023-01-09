@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">

            <div class="col-sm-12">
                <h1>{{ $post->title }}</h1>
                <p class="text">{{ $post->body }}</p>
            </div>
    
    </div>
</div>

@endsection 
