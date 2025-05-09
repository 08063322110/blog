
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


@extends('layouts.master')

@section('content')


<div class="main-content mt-5">
  

    <div class="card" >
        <div class="row">
            <div class="col-md-6">
                <h4>All Posts</h4>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success mx-1" href="{{route('posts.create')}}">Create</a>
                <a class="btn btn-warning mx-1" href="">Trashed</a>
            </div>
    
         <div class="card-body">
            <table class="table table-striped">
              
                <tbody>
                  
                  {{-- <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>
                      <img src="{{asset($post->image)}}" alt=""  width="80">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{date('d-m-y', strtotime($post->created_at))}}</td>
                    <td>
                        <a class="btn-sm btn-success" href="">Show</a>
                        <a class="btn-sm btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                        <a class="btn-sm btn-danger" href="">Delete</a>
                    </td>
                  </tr> --}}

                  <tr>
                    <td>Td</td>
                    <td>{{$post->id}}</td>
                  </tr>

                  <tr>
                    <td>Image</td>
                    <td><img width="300" src="{{asset($post->image)}}" alt=""></td>
                  </tr>

                  <tr>
                    <td>Title</td>
                    <td>{{$post->title}}</td>
                  </tr>

                  <tr>
                    <td>Description</td>
                    <td>{{$post->description}}</td>
                  </tr>

                  <tr>
                    <td>Category</td>
                    <td>{{$post->category_id}}</td>
                  </tr>

                  <tr>
                    <td>Publish Date</td>
                    <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                  </tr>
                  
                </tbody>
              </table>
        </div>
        </div>
           
    </div>

</div>


@endsection