<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class MainController extends Controller
{
    //
    public function home()
    {
        $data['posts'] = Post::latest()->get();
       

        return view('pages.home',$data);
    }
}
