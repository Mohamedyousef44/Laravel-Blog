<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Summary of PostController
 */
class PostController extends Controller
{
    function index(){

        // $posts = Post::all();
        // return PostResource::collection($posts) ;

        //use eager loading
        $posts = Post::with('user:id,name,email')->get(['id','title','content','user_id']);
        return response()->json(compact('posts'));
    }
    function show($id){

        $post = Post::find($id);
        return new PostResource($post);
    }
    
    function store(StorePostRequest $request){

        $data = $request->all();
        $path = "";
        $tags = $data['Tags'];
        $tags = explode(',' , $tags);
       
        if(isset($data['image'])){

            $file = $request->file('image');
            $path = $file->store('images' , ['disk'=>'public']);
        }

        $post = Post::create([

            "title"=>$data['title'],
            "description"=>$data['description'],
            "content"=>$data['content'],
            "image"=>$path,
            "tags"=>$tags,
            "user_id"=>$data['AuthorId'],
            
        ]);

        $post->syncTags($tags);
        
        return new PostResource($post);
    }

    
}
