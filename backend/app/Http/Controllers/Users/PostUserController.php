<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostUserController extends Controller {

    public function index($id)
    {
      //
      $posts = Posts::where('author_id',$id)->where('active',1)->orderBy('created_at','desc')->paginate(5);
      $title = User::find($id)->name;
      return view('home')->withPosts($posts)->withTitle($title);
    }

    public function user_posts_all(Request $request)
    {
      $user = $request->user();
      $posts = Posts::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
      $title = $user->name;
      return view('home')->withPosts($posts)->withTitle($title);
    }

    public function user_posts_draft(Request $request)
    {
      //
      $user = $request->user();
      $posts = Posts::where('author_id',$user->id)->where('active',0)->orderBy('created_at','desc')->paginate(5);
      $title = $user->name;
      return view('home')->withPosts($posts)->withTitle($title);
    }

    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
  }
