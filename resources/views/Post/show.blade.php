@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')

    <div class="card my-3">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
            <h5 class="card-title text-danger">{{strtoupper($post->title)}}</h5>
            <p class="card-title text-success">Description : {{strtoupper($post->description)}}</h5>
            <p class="card-text">{{strtoupper($post->content)}}</p>
            <a href="{{route('posts.index')}}" class="btn btn-primary">Home</a>
        </div>
        <div class="w-50 h-50">
            <img src="{{$post->image}}" alt="it is an image" >
        </div>
        <h4 class="px-3 text-danger">Tags</h4>
        <div class="d-flex justify-content-evenly align-items-center w-25">
            
            @foreach($post->tags as $tag)
            <p class="bg-dark text-light">{{$tag->name}}</p>
            @endforeach
        </div>
    </div>
    <div class="card my-3">
        <h5 class="card-header">Writer Info</h5>
        <div class="card-body">
            <h5 class="card-title text-danger mb-4">{{strtoupper($post->user()->where('id' , $post->user_id)->first()->name)}}</h5>
            <a href="">About</a>
        </div>
    </div>

    <div class="bg-info text-dark">
        <h5 class="my-3">Comments</h5>
        @foreach($comments as $comment)
        <p class="my-3">Name : {{$comment->user()->where('id' , $comment->user_id )->first()->name}} : {{$comment->content}}</p>
        @endforeach
    </div>
    <form action="{{route('posts.comment' , $post->id)}}" method="POST" class="my-3">
             @csrf
             <div class="mb-3">
                <label for="commenter" class="form-label">Name</label>
                <select name="commenter" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">comment</label>
                <input type="text" class="form-control" id="comment" name="comment">
            </div>
            <button type="submit" class="btn btn-success">Comment</button>
        </form>

@endsection

    
    

