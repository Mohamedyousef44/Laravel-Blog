@extends('layouts.app')

@section('title')
    Create
@endsection


@section('content')

        @error('AuthorId')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <form action="{{route('posts.store')}}" method="POST" class="my-3" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" >
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Tags">Tags</label>
                <input class="form-control @error('content') is-invalid @enderror" id="Tags" name="Tags"></input>
                
                    <!-- <div class="text-danger"></div> -->
                
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                <label class="input-group-text" for="image">Upload Photo</label>
            </div>
            @error('image')
                    <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="AuthorId" class="form-label">Author Name</label>
                <select name="AuthorId" class="form-control @error('content') is-invalid @enderror">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
@endsection