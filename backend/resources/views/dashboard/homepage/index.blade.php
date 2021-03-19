@extends('layouts.homepage')
@section('title')
Posts
@endsection
@section('content')
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach( $posts as $post )
            <div class="card">
                <div class="card-header">
                    <h4><a href="{{ url('home/'.$post->slug) }}" style="color: inherit;">{{ $post->title }}</a></h4>
                </div>
                <div class="card-body" style="max-height: 500px; overflow: hidden;
                -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
                mask-image: linear-gradient(to bottom, black 50%, transparent 100%);">
                    {!! $post->body !!}
                </div>
                <div class="card-footer">
                    {{ $post->created_at->format('M d,Y \a\t h:i a') }} By
                    <a href="{{ url('dashboard/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                </div>
            </div>
            @endforeach
            {!! $posts->render() !!}
        </div>
    </div>


@endif
@endsection
