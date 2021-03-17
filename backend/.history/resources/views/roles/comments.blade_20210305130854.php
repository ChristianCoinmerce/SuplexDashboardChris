@extends('layouts.dashboard')
@section('title', __('Comments Management'))
@section('content')


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Posts Management
                <div class="card-header-actions">
                    {{-- <a href="#addEmployeeModal1" data-toggle="modal" class="card-header-action"><i class="c-icon cil-plus"></i> Create Post</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            {{-- Per Page: &nbsp;
                            {!! Form::open([ 'url' => route('connect.roles'), 'method' => 'get' ]) !!}
                            {!! Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')) !!}
                            {!! Form::close() !!} --}}


                            <div class="col form-inline" style="justify-content: flex-end;">
                            <input style="width: 300px !important;" class="form-control" type="text"
                                placeholder="Search...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th style="cursor:pointer;">ID<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer; width:20%">Title<i class="fas fa-sort-up"></i></th>
                                    <th style="cursor:pointer; max-width:5%">Body<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer; width:180px">Timestamp<i class="text-muted fas fa-sort"></i></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- <tbody wire:loading.class.remove="d-none" class="d-none">
                                <tr>
                                    <td colspan="8">
                                        Loading... </td>
                                </tr>
                            </tbody> --}}
                            @if($comments)
                            @foreach($comments as $comment)
                            <tbody>
                                <tr class="" id="">
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->title }}</td>
                                    <td style="max-width: 400px">{!! str_limit(strip_tags($comment->body, '<div>'), 600) !!}</td>
                                    <td>{{ $comment->created_at }}
                                    </td>
                                    <td>
                                        <div id="editUserModal{{ $comment['id'] }}" class="modal fade" style="left: -170px">
                                            <div class="modal-dialog" >
                                                <div class="modal-content" style="width:800px">
                                                    <form method="POST" action="{{  route('posts.update') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Post</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input name="title" value="{{ $comment->title }}" type="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Body</label>
                                                                <textarea name='body' id="mytextarea" class="form-control" style="height: 500px">
                                                                    @if(!old('body'))
                                                                    {!! $comment->body !!}
                                                                    @endif
                                                                    {!! old('body') !!}
                                                                  </textarea>
                                                            </div>
                                                            <input type="hidden" name="post_id" class="element text" maxlength="255" size="8" value="{{ $comment['id'] }}"/></input>
                                                            <div class="button">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" class="btn btn-info" value="Save">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="deleteUserModal{{ $comment['id'] }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="GET" action="{{ route('posts.destroy', $comment['id']) }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Employee</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete these Records?</p>
                                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                        <div class="button">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <a href="{{  url('posts/delete/'.$comment['id']) }}"><button class="btn btn-danger">Delete</button></a>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown d-inline-block">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink"
                                                href="#" role="button" data-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false">Actions
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="" class="dropdown-item">View Post</a>
                                                <a href="#editUserModal{{ $comment['id'] }}" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal{{ $comment['id'] }}" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
