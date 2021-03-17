@extends('layouts.homepage')
@section('title')
Posts / {!! Str::limit($post->title, $limit = 40, $end = '....') !!}

@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
        href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

@endsection
@section('content')

@if($post)
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><a href="{{ url('home/'.$post->slug) }}" style="color: inherit;">{{ $post->title }}</a></h5>
            </div>
            <div class="card-body">
                {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
            </div>
            <div class="card-footer" >
                {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                <button class="btn" style="float: right"><a href="{{ url('home/edit/'.$post->slug)}}">Edit Post</a></button>
            </div>


        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <h6>Leave a comment</h6>
                </div>
                @if(Auth::guest())
                <p>Login to Comment</p>
                @else
                <div class="panel-body">
                    <form method="post" action="/home/comment/add">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="on_post" value="{{ $post->id }}">
                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Type here" name="body" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" name='post_comment'  type="button">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
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
