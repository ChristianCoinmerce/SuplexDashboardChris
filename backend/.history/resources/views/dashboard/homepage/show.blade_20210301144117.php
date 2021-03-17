@extends('layouts.homepage')
@section('title')
Posts / {!! Str::limit($post->title, $limit = 40, $end = '....') !!}

@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

@endsection
@section('content')

@if($post)
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">

                <h4><a href="{{ url('home/'.$post->slug) }}" style="color: inherit;">{{ $post->title }}</a></h4>


            </div>
            <div class="card-body">
                {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
            </div>
            <div class="card-footer">
                {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
                    href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                    <button class="btn btn-info" style="float: right"><a href="{{ url('home/edit/'.$post->slug)}}">Edit Post</a></button>

            </div>
            <div class="card-body">

  <div>
    <h2>Leave a comment</h2>
  </div>
  @if(Auth::guest())
    <p>Login to Comment</p>
  @else
    <div class="panel-body">
      <form method="post" action="/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="on_post" value="{{ $post->id }}">
        <input type="hidden" name="slug" value="{{ $post->slug }}">
        <div class="form-group">
          <textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
        </div>
        <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
      </form>
    </div>
  @endif
  <div>
    @if($comments)
    <ul style="list-style: none; padding: 0">
      @foreach($comments as $comment)
        <li class="panel-body">
          <div class="list-group">
            <div class="list-group-item">
              <h3>{{ $comment->author->name }}</h3>
              <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
            </div>
            <div class="list-group-item">
              <p>{{ $comment->body }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    @endif
  </div>
            </div>
        </div>
    </div>
</div>

@else
404 error
@endif
@endsection
