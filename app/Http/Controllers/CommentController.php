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
    public function store(Request $request, Comment $comment, Post $post)
    {

        $comment->user_id = $request->user()->id;
        $comment->body = $request->body;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('home')->with([
            'message' => 'Comment post successfully added!',
            'status' => 'success'
        ]);

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
    public function destroy(Comment $comment)
    {
        $comment = Comment::destroy($comment->id);
        if ($comment) {
            return redirect()->route('home')->with([
                'message' => 'Comment successfully deleted!',
                'status' => 'success'
            ]);
        }
    }
}
