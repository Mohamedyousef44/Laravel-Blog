
@extends('layouts.app')


@section('title')
    Posts
@endsection

@section('content')

    <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col" ></th>
                    <th scope="col" >Title</th>
                    <th scope="col" >Slug</th>
                    <th scope="col" >Posted By</th>
                    <th scope="col" >Created At</th>
                    <th scope="col" >Action</th>
                </tr>
            </thead>
            <tbody>
                
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post['id']}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->user()->where('id' , $post->user_id)->first()->name}}</td>
                        <td>{{$post->created_at->format('Y - m - d')}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <x-button href="{{route('posts.show' , $post['id'] )}}" title="View" color="success" />
                            <x-button href="{{route('posts.edit' , $post['id'] )}}" title="Edit" color="primary" />
                            <button class="btn btn-danger deletePost"  data_id="{{$post['id']}}" data-bs-toggle="modal" data-bs-target="#deleteModal">delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>

    <div class="d-flex flex-row justify-content-center align-items-center">
        {{$posts->links()}}
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @method('delete')
                        @csrf
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
    </div>

<script>

    let deleteBtns = document.querySelectorAll('.deletePost');
    deleteBtns.forEach(button=>{
        button.addEventListener('click' , (event)=>{
            let postId = Number(event.target.getAttribute('data_id'));
            let modalForm = document.querySelector('.modal-body form')
          
            modalForm.setAttribute('action' , `/posts/${postId}`)

        })
    })
</script>

@endsection

    
    

    