<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', true)
                ->orderBy('created_at', 'desc')
                ->paginate('5');

        return view('home', ['posts' => $posts]);
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', ['post' => $post]);
    }
}
