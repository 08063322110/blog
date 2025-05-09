
<link href="{{ asset('css/style.css') }}" rel="stylesheet">       


@extends('layouts.master')

@section('content')


<div class="main-content mt-5">
  

    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4>All Posts</h4>
            </div>
                                

            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success mx-1" href="{{route('posts.create')}}">Create</a>
                <a class="btn btn-warning mx-1" href="{{route('posts.trashed')}}">Trashed</a>
                {{-- <a class="btn btn-info mx-1" href="{{route('posts.editcategory')}}">Add Category</a> --}}
            </div>
          </div>
         <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" >Image<img src="" alt=""></th>
                    <th scope="col"  style="width: 20%">Title</th>
                    <th scope="col"  style="width: 30%">Description</th>
                    <th scope="col"  style="width: 10%">Category</th>
                    <th scope="col"  style="width: 10%">Publish Date</th>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                      <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                      <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    <th scope="col"  style="width: 20%">Actions</th>
                   

                  </tr>
                </thead>
                
                <tbody>

                  @foreach ($posts as $post )
                  
                  <tr>
                    <th scope="row">{{$post->id}}</th>
                    {{-- run php artisan storage:link, go create the storage folder inside the public folder, after u wwill see the storage folder inside the public folder --}}
                    <td>
                      <img src="{{asset($post->image)}}" alt=""  width="80">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{date('d-m-y', strtotime($post->created_at))}}</td>
                    <td>

                    <div class="d-flex">
                    
                        {{-- <a class="btn-sm btn-danger" href="">Delete</a> --}}
                    
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            <a class="btn-sm btn-success"  href="{{route('posts.show', $post->id)}}">Show</a>
                            <a class="btn-sm btn-info mx-1" href="{{route('posts.edit', $post->id)}}">Edit</a>
                            <a class="btn-sm btn-success mx-1" href="{{route('posts.editcategory', $post->id)}}">Edit Cat</a><br> <br>
                            <a class="btn-sm btn-secondary mx-1" href="{{route('posts.deletecat', $post->id)}}">DEL Cat </a>
                            <a class="btn-sm btn-primary mx-1" href="{{route('posts.comments', $post->id)}}"> comment  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                              <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                              <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                            </svg></a>

                            @method('DELETE')
                            <button class="btn-sm btn-danger mt-2">Del Posts</button>

                      </form>
                    </div>

                      </td>
                  </tr>

                  @endforeach
                  
                </tbody>
              </table>
              {{$posts->links()}}
        </div>
        </div>
           
    </div>

</div>


@endsection