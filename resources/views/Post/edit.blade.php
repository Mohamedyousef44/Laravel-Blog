@extends('layouts.app')

@section('title')
    edit
@endsection


@section('content')

        <form action="{{route('posts.update' , $post->id)}}" method="POST" class="my-3">
            
            @method('PUT')
            @csrf
           
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" value="{{$post->description}}" name="description">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <input class="form-control" id="content" value="{{$post->content}}" name="content" ></input>
            </div>
            <div class="mb-3">
                <label for="AuthorId" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="AuthorId" name="AuthorId" value="{{$post->user()->where('id' , $post->user_id)->first()->name}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
@endsection