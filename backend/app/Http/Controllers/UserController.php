<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Requests\UserRoleStoreRequest;
use App\Http\Requests\CheckRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller {

    public function user_posts($id)
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
      return view('admin.profile', $data);
    }

    public function logout(Request $request){
        Auth::logout();
        $data = "Logged out";
        return redirect('/');
    }


    public function connect_roles(Request $request){
        $user = User::paginate($request->get('per_page'));
        return view('roles.show', ['users' => $user], ['roles' => Role::get()]);
    }

    public function store_userrole(UserRoleStoreRequest $request){
        $validated = $request->validated();
        $roles = $validated['role_id'];
        $user = User::find($validated['user_id']);
        $user->update(["name" => $validated["name"],"email" => $validated["email"]]);
        if($validated["password"] != null) {
            $password = Hash::make($validated["password"]);
            $array = collect($request->validated())->forget(['password'])->put('password',$password)->all();
            $user->update($array);
        }
        $user->roles()->sync($roles);
        return redirect('dashboard/users');
    }

    public function store_user(UserRoleStoreRequest $request){
        $validated = $request->validated();
        $password = Hash::make($validated["password"]);
        $array = collect($request->validated())->forget(['password'])->put('password',$password)->all();
        $user = User::create($array);
        $roles = $validated['role_id'];
        $user->roles()->attach($roles);
        return redirect('dashboard/users');
    }

    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
  }
