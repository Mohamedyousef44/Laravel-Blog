@extends('layouts.app')

@section('title')
    Create
@endsection


@section('content')

        <form action="{{route('posts.store')}}" method="POST" class="my-3">
        @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="AuthorId" class="form-label">Author Name</label>
                <select name="AuthorId" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
@endsection