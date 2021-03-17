@extends('layouts.dashboard')
@section('title', __('Posts Management'))
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
                {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
                @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                <a href="{{ url('home/edit/'.$post->slug)}}" style="color: white; float: right; text-decoration: none; " class="btn-sm btn-info">Edit Post</a>
                <a href="{{  url('home/delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn-sm btn-warning" style="margin-right:3px; color: white; float: right; text-decoration: none; ">Delete</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@endsection
