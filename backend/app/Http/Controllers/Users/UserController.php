<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function profile(Request $request, $id)
    {
      $data['user'] = User::find($id);
      if (!$data['user'])
        return redirect('/');
      if ($request -> user() && $data['user'] -> id == $request -> user() -> id) {
        $data['author'] = true;
      } else {
        $data['author'] = null;
      }
      $data['comments_count'] = $data['user'] -> comments -> count();
      $data['posts_count'] = $data['user'] -> posts -> count();
      $data['posts_active_count'] = $data['user'] -> posts -> where('active', '1') -> count();
      $data['posts_draft_count'] = $data['posts_count'] - $data['posts_active_count'];
      $data['latest_posts'] = $data['user'] -> posts -> where('active', '1') -> take(5);
      $data['latest_comments'] = $data['user'] -> comments -> take(5);
      return view('userpage/admin/profile', $data);
    }

    public function logout(Request $request){
        Auth::logout();
        $data = "Logged out";
        return redirect('/');
    }
  }
