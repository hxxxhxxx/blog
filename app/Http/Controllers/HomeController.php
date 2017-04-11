<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

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

    // 文章详情页
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', ['post' => $post]);
    }

    // 标签页
    public function tags($search = null)
    {
        $data = [];
        $data['tags'] = Tag::all();

        if ($search) {
            $data['searchTag'] = Tag::where('name', $search)->first();
        }

        return view('tags', $data);
    }

    // 归档页
    public function archives()
    {
        $posts = Post::all();

        return view('archives', ['posts' => $posts, 'count' => count($posts)]);
    }
}
