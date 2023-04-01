<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
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

        $posts = Post::paginate(9);
        return view('post.index' , ['posts' =>$posts]);
    }
    function show($id){

        $post = Post::find($id);
        $users = User::all();
        $comments = Comment::where('post_id' , $post->id)->get();
        return view('post.show' , ['post'=>$post , 'comments'=>$comments , 'users'=>$users]);
    }
    function comment(Request $request , $id){

        $data = $request->all();
        Comment::create([

            "user_id"=>$data['commenter'],
            "post_id"=>$id,
            "content"=>$data['comment'],
        ]);

        return redirect()->route('posts.show' , $id);
    }
    function create(){

        $users = User::all();
        return view('post.create', ['users' => $users]);

    }
    function edit($id){

        $post = Post::find($id);
        return view('post.edit' , ['post'=>$post]);

    }

    function update($id , UpdatePostRequest $request){

        $data = $request->all();
        // $tags = explode(',' , $tags); 
        $userId = User::where('name' , $data['AuthorId'])->first()->id;
        $post = Post::find($id);

        //check if user upload or not

        // dd($post->image); // http://127.0.0.1:8000/storage/images/06HzVj5JZn5CaFQp6ttKjptvMijlHlSzEuvv9LoD.jpg

        if(isset($data['image'])){

            $check = Storage::disk('public')->delete($post->image);
            $file = $request->file('image');
            $path = $file->store('images' , ['disk'=>'public']);
            $post->image = $path;

        }

        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->content = $data["content"];
        $post->user_id = $userId;
        // $post->syncTags($tags);
        $post->save();

        return redirect()->route('posts.index');
    }
    function store(StorePostRequest $request){

        $data = $request->all();
        $path = "";
        // dd($data);
        $tags = $data['Tags'];
        $tags = explode(',' , $tags);
        // dd($tags);

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
        
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Storage::disk('public')->delete($post->image);
        return redirect()->route('posts.index'); 
    }
  
}
