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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">

                    <a href="{{ url('home/'.$post->slug) }}" style="color: inherit;">{{ $post->title }}</a>


                </div>
                <div class="card-body">
                    {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
                </div>
                <div class="card-footer">
                    {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
                        href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {!! $posts->render() !!}
</div>
@endif
@endsection
