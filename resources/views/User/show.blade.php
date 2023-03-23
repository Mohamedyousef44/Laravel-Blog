@extends('layouts.app')

@section('title')
    My Gallery
@endsection


@section('content')

<div class="container">

    <div class="row">

        @foreach($photos as $photo)

        <div class="col-3 d-flex flex-column justify-content-between align-items-center">
            <img src="{{$photo->getUrl()}}" class="cus-img w-100">
            <a href="{{route('users.index')}}" image-id='{{$photo->id}}' class="btn btn-dark w-100 setProfile">Set as Profile Picture</a>
        </div>

    @endforeach
        
    </div>


</div>

<script>

let btns = document.querySelectorAll('.setProfile');

btns.forEach(button=>{
    button.addEventListener('click' , (event)=>{
        let idx = Number(event.target.getAttribute('image-id'))
        document.cookie = 'pp='+idx;
    })
})

</script>
@endsection


