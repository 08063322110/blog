<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 // $posts = Post::all();   ___this will no longer hold as we want to pagiante lately, hence below:

        $posts = Post::paginate(3);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }


    public function comments()
    {
    
        $post = Post::findOrFail ($id);
        return view('comments');   
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'image' =>['required', 'max:2028', 'image'],
            'title' => ['required', 'max:255'],
            'category_id' =>['required', 'integer'],
            'description' =>['required'] 
        ]);


        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

    
    
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->category_id = $request ->category_id;
    $post->image = 'storage/'.$filePath;

    $post->save();

    return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail ($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }



    public function editcategory(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('editcategory', compact('post', 'categories'));
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' =>['required', 'max:255'],
            'category_id' =>['required', 'integer'],
            'description' =>['required']
        ]);

        $post = Post::findOrFail($id);
        if($request->hasFile('image')) {
            $request->validate([
                'image' =>['required', 'max:2028', 'image'],
            ]);

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);
            
//below will help to delete our corresponding image file
            File::delete(public_path($post->image));
            $post->image = 'storage/'.$filePath;
        }

         $post->title = $request->title;
         $post->description = $request->description;
        $post->category_id = $request ->category_id;

        $post->save();

        return redirect()->route('posts.index');

    }



    public function updatedcategory(Request $request, string $id)
    {
        $request->validate([
            'title' =>['nullable', 'max:255'],
            'category_id' =>['required', 'integer'],
            'description' =>['nullable']
        ]);

        $post = Post::findOrFail($id);
        if($request->hasFile('image')) {
            $request->validate([
                'image' =>['required', 'max:2028', 'image'],
            ]);

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);
            
//below will help to delete our corresponding image file
            File::delete(public_path($post->image));
            $post->image = 'storage/'.$filePath;
        }

        // $post->title = $request->title;
        // $post->description = $request->description;
        $post->category_id = $request ->category_id;

        $post->save();

        return redirect()->route('posts.index');

    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
        // $post = Post::findOrFail($id);
        // $post -> delete();
        // return redirect()->route('posts.index');


public function destroy($id)
{
    
$post = Post::findOrFail($id);
$post->delete();

return redirect()->route('posts.index');

}

public function deletecat($id)
{
    
$post = Post::findOrFail($id);
$post->delete();

return redirect()->route('posts.index');
return view('deletecat');
}


    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('trashed', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }

    public function forceDelete($id){
        $post = Post::onlyTrashed()->findOrFail($id);
//below will help to delete our corresponding image file
        File::delete(public_path($post->image));
        $post->forceDelete();
        return redirect()->back();
    }


    // public function removeCategory($postId)
    // {
    //     $post = Post::find($postId);
    //     if ($post) {
    //         $post->category()->dissociate();
    //         $post->save();
    //     }
    
    //     return redirect()->back()->with('success', 'Category removed successfully.');
    // }
    
}
