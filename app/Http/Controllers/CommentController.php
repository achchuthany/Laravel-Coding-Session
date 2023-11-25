<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        $this->validate($request, [
            'comment' => ['required', 'min:3', 'max:1000']
        ]);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post;
        $comment->save();

        return redirect()->route('posts.show', [$comment->post_id])->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        if(auth()->user()->id != $comment->user_id) {
            return redirect()->route('posts.show', [$comment->post_id])->with('error', 'Unauthorized access.');
        }
        $comment->delete();
        return redirect()->route('posts.show', [$comment->post_id])->with('success', 'Comment deleted successfully.');
    }
}
