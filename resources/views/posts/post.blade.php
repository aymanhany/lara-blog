@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1>{{ $post->title }}</h1>
                <p class="text">{{ $post->body }}</p>
            </div>

        </div>

        <div class="comments">
            @foreach ($post->comments as $comment)
                <div class="comment mt-3">
                    <p>{{ $comment->content }}</p>
                    <p class="text-muted">
                        Commented by
                        {{-- @php
                            $user = User::find($comment->user_id)
                        @endphp --}}
                        <a href="#">{{ $comment->user_name }}</a>
                        on {{ $comment->created_at->format('M d, Y') }}
                    </p>
                </div>
            @endforeach
        </div>
        

        <div class="row">
            <div class="col-sm-12 mt-5">
                <form method="POST" action="{{ route('comments.store', ['id' => $post->id]) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Submit Comment</button>
                </form>

            </div>
        </div>
    </div>
@endsection
