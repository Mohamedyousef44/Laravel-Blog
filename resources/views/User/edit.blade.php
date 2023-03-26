@extends('layouts.app')

@section('title')
    edit 
@endsection


@section('content')

<form action="{{route('users.update' , $user->id)}}" method="POST" class="my-3" enctype="multipart/form-data">
            
            @method('PUT')
            @csrf
           
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" value="********" name="password" ></input>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-50">

                @if(count($user->getMedia('images')) == 0)

                <img src="/pp.png" alt="my profile image" class="cus-img">

                @else

                <img src="{{$user->getMedia('images')->last()->getUrl()}}" class="cus-img">

                @endif
                
            </div>

            <div class="input-group mb-3">
                <input type="file" class="form-control  @error('image') is-invalid @enderror" id="image" name="image">
                <label class="input-group-text" for="image" >Upload Photo</label>
            </div>
            @error('image')
                    <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success">Update</button>
        </form>
@endsection