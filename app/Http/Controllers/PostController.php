<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

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
        return redirect()->route('posts.index');
    }
    function edit($id){
        $post = Post::find($id);
        return view('post.edit' , ['post'=>$post]);
    }
    function update($id , Request $request){

        $data = $request->all();
        $userId = User::where('name' , $data['AuthorId'])->first()->id;

        $post = Post::find($id);
        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->content = $data["content"];
        $post->user_id = $userId;
        $post->save();
        return redirect()->route('posts.index');
    }
    function store(Request $request){

        $data = $request->all();

        Post::create([

            "title"=>$data['title'],
            "description"=>$data['description'],
            "content"=>$data['content'],
            "user_id"=>$data['AuthorId'],
            
        ]);
        
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        dd($id , $post );
        $post->delete();
 
        return redirect()->route('posts.index'); 
    }
}
