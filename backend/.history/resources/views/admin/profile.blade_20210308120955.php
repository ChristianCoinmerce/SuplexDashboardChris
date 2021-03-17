@extends('layouts.homepage')
@section('title','User Profile')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
  <ul class="list-group" style="background-color:white;">
    <li class="list-group-item">
        User: {{$user->name }}
    </li>
    <li class="list-group-item panel-body">
      <table class="table-padding">
        <style>
          .table-padding td{
            padding: 3px 8px;
          }
        </style>
        <tr>
          <td>Total Posts</td>
          <td> {{$posts_count}}</td>
          {{-- @if($author && $posts_count)
          <td><a href="{{ url('/my-all-posts')}}">Show All</a></td>
          @endif --}}
        </tr>
        <tr>
          <td>Published Posts</td>
          <td>{{$posts_active_count}}</td>
          {{-- @if($posts_active_count)
          <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
          @endif --}}
        </tr>
        <tr>
            <td>Total Comments</td>
            <td>{{$comments_count}}</td>
            {{-- @if($posts_active_count)
            <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
            @endif --}}
          </tr>
        <tr>
          <td>Posts in Draft </td>
          <td>{{$posts_draft_count}}</td>
          {{-- @if($author && $posts_draft_count)
          <td><a href="{{ url('my-drafts')}}">Show All</a></td>
          @endif --}}
        </tr>
      </table>
    </li>
    <li class="list-group-item">

      Joined on {{$user->created_at->format('M d,Y \a\t h:i a') }}
    </li>
  </ul>



<br>
  <div class="list-group-item" style="background-color: white;">Latest Posts</div>
  @if(!empty($latest_posts[0]))
  @foreach($latest_posts as $latest_post)
  <div class="list-group-item" style="background-color:white;">
      <p>
        "<a style="text-decoration: none; background-color: none;" href="{{ url('home/'.$latest_post->slug) }}">{{ Str::limit($latest_post->title, 60) }}</a>" -
        <span style="text-align:right" class="well-sm">On {{ $latest_post->created_at->format('M d,Y \a\t h:i a') }}</span>
      </p>
  </div>
  @endforeach
  @else
  <p>You have not written any post till now.</p>
  @endif
<br>

  <div class="list-group-item" style="background-color: white;">Latest Comments</div>

    @if(!empty($latest_comments[0]))
    @foreach($latest_comments as $latest_comment)
      <div class="list-group-item" style="background-color: white">
        <p>"{{ $latest_comment->body }}" - On post <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ Str::limit($latest_comment->post->title, 30) }}</a> /
            On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}
        </p>
      </div>
    @endforeach
    @else
    <div class="list-group-item">
      <p>You have not commented till now. Your latest 5 comments will be displayed here</p>
    </div>
    @endif

</div>
</div>

@endsection
