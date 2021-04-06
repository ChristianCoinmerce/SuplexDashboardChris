<?php

namespace App\Http\Controllers\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;


class AdminPostController extends Controller
{

// ADMIN DASHBOARD BELOW
    public function show(Request $request){
        $post = Posts::where('active',1)->orderBy('created_at','desc')->paginate(10);
        return view('adminpage/access/posts/posts')->withPosts($post);
    }

    public function display($slug){
        $post = Posts::where('slug',$slug)->first();
        if(!$post)
        {
        return redirect('dashboard/posts')->withErrors('requested page not found');
        }
        $comments = $post->comments;
        return view('adminpage/access/posts/post-show')->withPost($post)->withComments($comments);
    }

    public function edit(Request $request,$slug){
        $post = Posts::where('slug',$slug)->first();
        return view("adminpage/access/posts/post-edit")->with('post',$post);
        return redirect('dashboard/posts')->withErrors('you have not sufficient permissions');
    }

    public function update(Request $request){
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);
        $title = $request->input('title');
        $post->title = $title;
        $post->body = $request->input('body');
        $post->save();
        return redirect('dashboard/posts');
    }

    public function destroy(Request $request, $id){
        $post = Posts::find($id);
        $post->delete();
        return redirect('dashboard/posts');
    }


}
