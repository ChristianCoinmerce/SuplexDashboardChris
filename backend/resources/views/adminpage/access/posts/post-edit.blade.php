@extends('adminpage.dashboard')
@section('title')
<a href="{{ url('dashboard/posts')}}" style="color: #3C4B64; text-decoration:none !important;">Posts Management</a>&nbsp; /&nbsp;{!! Str::limit($post->title, $limit = 40, $end = '....') !!}

@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
            <form method="post" action='{{ route('yeye123') }}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input required="required" placeholder="Enter title here" type="text" name="title"
                                class="form-control"
                                value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <textarea name='body' id="mytextarea" class="form-control" style="height: 500px">
                                @if(!old('body'))
                                {!! $post->body !!}
                                @endif
                                {!! old('body') !!}
                            </textarea>
                        </div>
                        @if($post->active == '1')
                        <input type="submit" name='publish' class="btn btn-success" value="Update"/>
                        @endif
                    </div>
                </div>
            </form>

    </div>
</div>
@endsection
