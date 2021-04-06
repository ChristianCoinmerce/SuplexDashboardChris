<?php

namespace App\Http\Controllers\Comments;
use App\Models\Comments;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCommentController extends Controller {

    public function show(Request $request){
        $comments = Comments::paginate($request->get('per_page'));
        $post_id = Comments::get('on_post');
        $posts = Posts::where('id', $post_id);
        return view('adminpage/access/comments', ['comments' => $comments]);
    }


    public function update(Request $request){
        $comments_id = $request->input('comment_id');
        $comment = Comments::find($comments_id);
        $body = $request->input('body');
        $comment->body = $body;
        $comment->save();
        return redirect('dashboard/comments');
    }

    public function destroy(Request $request, $id){
        $comment = Comments::find($id);
        $comment->delete();
        return redirect('dashboard/posts');
    }

}
