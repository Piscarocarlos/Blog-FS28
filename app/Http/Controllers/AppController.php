<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(9);
        return view('welcome', compact('posts'));
    }

    public function detailsPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if($post){
            return view('detail', compact('post'));
        } else {
            return redirect()->route('home_page');
        }
    }
}
