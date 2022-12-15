<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required|email",
            'sujet' => 'required',
            'content' => 'required'
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactMail(
            $request->name,
            $request->email,
            $request->sujet,
            $request->content
        ));
        return back();
    }
}
