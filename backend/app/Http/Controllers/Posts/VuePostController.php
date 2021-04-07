<?php

namespace App\Http\Controllers\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use Auth;
use App\Http\Resources\Post as PostResource;

class VuePostController extends Controller
{
// API LARAVEL TO VUE BELOW

    public function index(){
        $posts = Posts::with('author')
            ->orderBy('created_at', 'Desc')
            ->paginate(5);
        return PostResource::collection($posts);
    }

    public function store(Request $request){

        if($request->isMethod('put')){
        $post = $request->isMethod('put') ? Posts::findOrFail($request->id) : new Posts();
            if($post->author_id == $request->user()->id){
                $post->title = $request->get('title');
                $post->body = $request->get('body');
                $post->slug = Str::slug($post->title);
                $post->author_id = 1;

                if ($post->save()) {
                    return new PostResource($post);
                }
            }
        }

        else{
            // auth()->user()->id
            $post = new Posts();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->slug = Str::slug($post->title);
            $post->author_id = 1;
            if ($post->save()) {
                return new PostResource($post);
            }
        }
    }

    public function show($id){
        $post = Posts::findOrFail($id);
        return new PostResource($post);
    }

    public function destroy(Request $request, $id){
        $post = Posts::find($id);
        if($post && ($post->author_id == $request->user()->id)){
            $post->delete();
            return new PostResource($post);
        }
    }
}

