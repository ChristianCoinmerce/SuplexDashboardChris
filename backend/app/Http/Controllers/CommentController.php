<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller {
  public function store(Request $request)
  {
    $input['from_user'] = $request->user()->id;
    $input['on_post'] = $request->input('on_post');
    $input['body'] = $request->input('body');
    $slug = $request->input('slug');
    Comments::create($input);
    return redirect('home/'.$slug);
  }

  public function destroy(Request $request, $id)
  {
        $comments = Comments::find($id);
        $numb1 = number_format($comments['from_user']);
        $auth = Auth::id();
      if($numb1 == $auth)
      {
        $comments->delete();
        $data['message'] = 'Comment deleted';
      } else{
        // $data['errors'] = 'no permission';
      }
      return back();
  }

//-------------------------------------

    public function show_crud(Request $request){
        $comments = Comments::paginate($request->get('per_page'));
        $post_id = Comments::get('on_post');
        $posts = Posts::where('id', $post_id);
        return view('roles.comments', ['comments' => $comments]);
    }


    public function update_crud(Request $request){
        $comments_id = $request->input('comment_id');
        $comment = Comments::find($comments_id);
        $body = $request->input('body');
        $comment->body = $body;
        $comment->save();
        return redirect('dashboard/comments');
    }

    public function destroy_crud(Request $request, $id){
        $comment = Comments::find($id);
        $comment->delete();
        return redirect('dashboard/posts');
    }

}
