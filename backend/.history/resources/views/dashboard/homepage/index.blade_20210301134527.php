@extends('layouts.homepage')
@section('title')
Posts
@endsection
@section('content')
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $posts as $post )
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <a href="{{ url('home/'.$post->slug) }}" style="color: inherit;">{{ $post->title }}</a>
                    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                      @if($post->active == '1')
                      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
                      @else
                      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                      @endif
                    @endif

                  {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>

            </div>
            <div class="card-body">
  <div class="list-group">
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
</div>
</div>
</div>
</div>
  @endforeach
  {!! $posts->render() !!}
</div>
@endif
@endsection
