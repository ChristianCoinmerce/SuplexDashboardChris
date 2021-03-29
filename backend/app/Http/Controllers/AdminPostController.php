<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Posts;
use App\Http\Resources\Post as PostResource;

class AdminPostController extends Controller
{

// ADMIN DASHBOARD BELOW
    public function show_crud(Request $request){
        $post = Posts::where('active',1)->orderBy('created_at','desc')->paginate(10);
        return view('roles.posts')->withPosts($post);
    }

    public function display_crud($slug){
        $post = Posts::where('slug',$slug)->first();
        if(!$post)
        {
        return redirect('homepage/posts')->withErrors('requested page not found');
        }
        $comments = $post->comments;
        return view('roles.post-show')->withPost($post)->withComments($comments);
    }

    public function edit_crud(Request $request,$slug){
        $post = Posts::where('slug',$slug)->first();
        return view("roles.post-edit")->with('post',$post);
        return redirect('dashboard/posts')->withErrors('you have not sufficient permissions');
    }

    public function update_crud(Request $request){
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);
        $title = $request->input('title');
        $post->title = $title;
        $post->body = $request->input('body');
        $post->save();
        return redirect('dashboard/posts');
    }

    public function destroy_crud(Request $request, $id){
        $post = Posts::find($id);
        $post->delete();
        return redirect('dashboard/posts');
    }


}
