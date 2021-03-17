@extends('layouts.app')

@section('content')
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
  @foreach( $posts as $post )
  <div class="post-preview">
    <a href="{{ url('/'.$post->slug) }}">
    <h2 class="post-title">
        {{ $post->title }}
    </h2>
    <h3 class="post-subtitle">
        {!! Str::limit($post->body, $limit = 285) !!}
    </h3>
  </a>
  <p class="post-meta">{{ $post->created_at->format('M d,Y \a\t h:i a') }}. Posted by: <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
  <hr>
</div>
  @endforeach
    <div class="clearfix">
        {!! $posts->render() !!}
    </div>
@endif
@endsection
