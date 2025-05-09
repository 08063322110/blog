@extends('layouts.master')

@section('content')


<div class="main-content mt-5">

    
    @if ($errors->any())
        
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>     
            @endforeach
            
     @endif


    <div class="card" >
        <div class="row">
            <div class="col-md-6">
                <h4>Delete category Posts</h4>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-success mx-1" href="{{route('posts.index')}}">Back</a>
              
            </div>
    
         
        </div>
        <div class="card-body">
            <form action="{{route('posts.deletecat', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select</option>
                       @foreach ($categories as $category)
                           <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                    </select>
                </div>
                
               
                
                {{-- <div class="form-group mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div> --}}
                @method('DELETE')
                <button class="btn-sm btn-danger mt-2">Delete Posts</button>
            </form>
        </div>
           
    </div>

</div>


@endsection