<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller {
  public function store(Request $request)
  {
    $input['from_user'] = $request->user()->id;
    $input['on_post'] = $request->input('on_post');
    $input['body'] = $request->input('body');
    $slug = $request->input('slug');
    Comments::create( $input );
    return redirect($slug)->with('message', 'Comment posted');
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
}
