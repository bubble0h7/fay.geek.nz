<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published', '=', 1)->get();
        $active = "blog";
        return view ('posts/index')->with(compact('posts', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:posts',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);

        return redirect()->action('PostController@index')->with(['status' => 'Post created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $post = Post::where('title', '=', str_replace('-', ' ', $title))->first();
        $active = "blog";
        return view ('posts/show')->with(compact('post', 'active'));
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
        return view ('posts/edit')->with(compact('post'));
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
        $request->validate([
            'title' => 'required|string',
            'content' => 'string',
        ]);

        $post = Post::find($id);
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return redirect()->action('PostController@show', str_replace(' ', '-', strtolower($post->title)))->with(['status' => 'Post updated.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $post = Post::find($id);
        $post->published = 1;
        $post->save();

        return redirect()->action('PostController@index')->with(['status' => 'Post published.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish($id)
    {
        $post = Post::find($id);
        $post->published = 0;
        $post->save();

        return redirect()->action('PostController@show', str_replace(' ', '-', strtolower($post->title)))->with(['status' => 'Post unpublished.']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->action('PostController@index')->with(['status' => 'Post deleted.']);
    }
}
