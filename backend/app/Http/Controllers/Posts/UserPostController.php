<?php

namespace App\Http\Controllers\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Posts;
use App\Http\Resources\Post as PostResource;

class UserPostController extends Controller
{

// USER HOMEPAGE BELOW
    public function index(){
    $post = Posts::where('active',1)->orderBy('created_at','desc')->paginate(5);
    return view('userpage/homepage/index')->withPosts($post);
    }

    public function create(Request $request)
    {
        if ($request->user()->can_post()) {
            return view('userpage/homepage/create');}
        else {
            return redirect('userpage/homepage/index')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    public function store(PostFormRequest $request){
        $post = new Posts();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = Str::slug($post->title);

        $duplicate = Posts::where('slug', $post->slug)->first();
        if ($duplicate) {
        return redirect('userpage/homepage/index')->withErrors('Title already exists.')->withInput();
        }

        $post->author_id = $request->user()->id;
        if ($request->has('save')) {
        $post->active = 0;
        $message = 'Post saved successfully';
        } else {
        $post->active = 1;
        $message = 'Post published successfully';
        }
        $post->save();
        return redirect('home/edit/' . $post->slug)->withMessage($message);
    }

    public function show($slug){
        $post = Posts::where('slug',$slug)->first();
        if(!$post)
        {
        return redirect('/')->withErrors('requested page not found');
        }
        $comments = $post->comments;
        return view('userpage/homepage/show')->withPost($post)->withComments($comments);
    }

    public function edit(Request $request,$slug){
        $post = Posts::where('slug',$slug)->first();
        if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
        return view('userpage/homepage/edit')->with('post',$post);
        return redirect('/')->withErrors('you have not sufficient permissions');
    }

    public function update(Request $request){
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
        $title = $request->input('title');
        $slug = Str::slug($title);
        $duplicate = Posts::where('slug', $slug)->first();
        if ($duplicate) {
            if ($duplicate->id != $post_id) {
            return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
            } else {
            $post->slug = $slug;
            }
        }

        $post->title = $title;
        $post->body = $request->input('body');

        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
            $landing = 'edit/' . $post->slug;
        } else {
            $post->active = 1;
            $message = 'Post updated successfully';
            $landing = $post->slug;
        }
        $post->save();
        return redirect($landing)->withMessage($message);
        } else {
        return redirect('/')->withErrors('you have not sufficient permissions');
        }
    }

    public function destroy(Request $request, $id){
        //
        $post = Posts::find($id);
        if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
        {
            $post->delete();
            $data['message'] = 'Post deleted';
        } else{
            $data['errors'] = 'no permission';
        }
        return redirect('home')->with($data);
    }


// API LARAVEL TO VUE BELOW
    public function index_vue(){

        $posts = Posts::with('author')
            ->orderBy('created_at', 'Desc')
            ->paginate(5);
        return PostResource::collection($posts);
    }

    public function store_vue(Request $request){

        if($request->isMethod('put')){
        $post = $request->isMethod('put') ? Posts::findOrFail($request->id) : new Posts();
            if($post->author_id == $request->user()->id){
                $post->title = $request->get('title');
                $post->body = $request->get('body');
                $post->slug = Str::slug($post->title);
                $post->author_id = auth()->user()->id;

                if ($post->save()) {
                    return new PostResource($post);
                }
            }
        }

        else{
            $post = new Posts();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->slug = Str::slug($post->title);
            // dd(auth()->check());
            $post->author_id = auth()->user()->id;

            if ($post->save()) {
                return new PostResource($post);
            }
        }
    }
    public function show_vue($id){
        $post = Posts::findOrFail($id);
        return new PostResource($post);
    }

    public function destroy_vue(Request $request, $id){
        $post = Posts::find($id);
        if($post && ($post->author_id == $request->user()->id)){
            $post->delete();
            return new PostResource($post);
        }
    }
}

