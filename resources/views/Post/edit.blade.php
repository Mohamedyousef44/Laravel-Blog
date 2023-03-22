@extends('layouts.app')

@section('title')
    edit
@endsection


@section('content')

        <form action="{{route('posts.update' , $post->id)}}" method="POST" class="my-3" enctype="multipart/form-data">
            
            @method('PUT')
            @csrf
           
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$post->title}}" name="title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" value="{{$post->description}}" name="description">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <input class="form-control  @error('content') is-invalid @enderror" id="content" value="{{$post->content}}" name="content" ></input>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <img src="{{$post->image}}">
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control  @error('image') is-invalid @enderror" id="image" name="image">
                <label class="input-group-text" for="image" >Upload Photo</label>
            </div>
            @error('image')
                    <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="AuthorId" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="AuthorId" name="AuthorId" value="{{$post->user()->where('id' , $post->user_id)->first()->name}}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
@endsection