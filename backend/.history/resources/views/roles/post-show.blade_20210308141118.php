@extends('layouts.dashboard')
@section('title')
Posts / {!! Str::limit($post->title, $limit = 40, $end = '....') !!}

@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
        href="{{ url('home/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

@endsection
@section('content')

@if($post)
<div class="row justify-content-center">
    <div class="col-md-8">
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
                <div>
                    <h6>Leave a comment</h6>
                </div>
                <h4> Comments</h4>
            </div>

            @if($comments)
            @foreach($comments as $comment)
            <div class="card-footer">
                <div>
                    <ul style="list-style: none; padding: 0">
                                    <h3>{{ $comment->author->name }}</h3>
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
