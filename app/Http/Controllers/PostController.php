<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private function isMyPost(Post $post){
        if(auth()->user()->hasAnyRole('user') && auth()->user()->id !== $post->user_id){
            return redirect()->route('posts.index')->with('error', 'Unauthorized Page');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title' => ['required', 'min:3', 'max:100'],
           'body' => ['required', 'min:3', 'max:1000']
       ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $redirect = $this->isMyPost($post);
        if ($redirect) return $redirect;
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $redirect = $this->isMyPost($post);
        if ($redirect) return $redirect;
        $this->validate($request, [
            'title' => ['required', 'min:3', 'max:100'],
            'body' => ['required', 'min:3', 'max:1000']
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $redirect = $this->isMyPost($post);
        if ($redirect) return $redirect;
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
