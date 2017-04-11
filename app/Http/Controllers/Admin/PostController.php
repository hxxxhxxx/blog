<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $fields = ['title', 'slug', 'content'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.post.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'bail|required|unique:posts',
            'content' => 'required'
        ]);

        $post = new Post;
        foreach ($this->fields as $field) {
            $post->$field = $request->get($field);
        }

        // 如果是草稿，将 status 设为 false
        if ($request->get('is_draft')) {
            $post->status = false;
        }

        $post->save();

        // 同步标签
        $post->syncTags($request->get('tags', []));

        return redirect('/admin/posts')->with('success', "文章 $post->title 添加成功");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = $post->tags();

        return view('admin.post.edit', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'bail|required',
            'content' => 'required'
        ]);

        $post = Post::findOrFail($id);
        foreach ($this->fields as $field) {
            $post->$field = $request->get($field);
        }

        // 如果是草稿，将 status 设为 false
        if ($request->get('is_draft')) {
            $post->status = false;
        } else {
            $post->status = true;
        }

        $post->save();
        $post->syncTags($request->get('tags'));

        return redirect('admin/posts')->with('success', "文章 $post->title 修改成功");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('admin/posts')->with('success', "文章 $post->title 删除成功");
    }
}
