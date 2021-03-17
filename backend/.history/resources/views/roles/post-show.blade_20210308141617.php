@extends('layouts.dashboard')
@section('title')
<a href="">Posts Management </a>&nbsp; / {!! Str::limit($post->title, $limit = 40, $end = '....') !!}

@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
        href="{{ url('home/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

@endsection
@section('content')

@if($post)

<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                <h5 style="color: inherit;">{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                {!! $post->body !!}
            </div>
            <div class="card-footer" >
                {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('home/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p style="font-size: 30px">Comments</p>
            </div>

            @if($comments)
            @foreach($comments as $comment)
            <div class="card-footer">
                <div>
                    <ul style="list-style: none; padding: 0">
                                    <h5>{{ $comment->author->name }}</h5>
                                    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                                    <p>{{ $comment->body }}</p>
                    </ul>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@else
404 error
@endif
@endsection
