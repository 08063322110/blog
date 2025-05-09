
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
                        <a class="btn-sm btn-success" href="{{route('posts.restore', $post->id)}}">Restore</a>
                   
                        <form action="{{route('posts.force_delete', $post->id)}}" method="POST">

                          @csrf
                          @method('DELETE')
                          <button class="btn-sm btn-danger btn mx-2">Delete</button>
                          </form>
                      </div>
                      </td>
                  </tr>

                  @endforeach
                  
                </tbody>
              </table>
        </div>
        </div>
           
    </div>

</div>


@endsection