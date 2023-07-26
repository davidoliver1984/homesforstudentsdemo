<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->filled('query')) {
            $query = $request->input('query');
            $posts = Post::where('title', 'LIKE', "%{$query}%")->latest()->paginate(10);
            return view('posts.index', [
                'posts' => $posts,
                'query' => $query,
            ]);

        } else {
            return view('posts.index', [
                'posts' => DB::table('posts')->latest()->paginate(10),
                'query' => false,
            ]);
        }
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
    public function store(CreatePostRequest $request): RedirectResponse
    {

        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->slug = Str::slug($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;

        if ($request->image_url) {
            $image_url = Str::slug($request->title) . '.' . $request->image_url->extension();
            $request->image_url->storeAs('public/images', $image_url);
            $post->image_url = $image_url;
        }

        $post->save();

        return redirect()->route('home')->with([
            'message' => 'Blog post added successfully!',
            'status' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Comment $comments)
    {
        $comments = Comment::find($post->id);
        //dd($comments);
        return view('posts.show', [
            'comments' => $comments,
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        //dd($request);
        $post = Post::find($post->id);
        $post->user_id = $request->user()->id;
        $post->slug = Str::slug($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;

        if ($request->image_url) {
            $image_url = Str::slug($request->title) . '.' . $request->image_url->extension();
            $request->image_url->storeAs('public/images', $image_url);
            $post->image_url = $image_url;
        }

        $post->save();

        return redirect()->route('home')->with([
            'message' => 'Blog post updated successfully!',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::destroy($post->id);
        if ($post) {
            return redirect()->route('home')->with([
                'message' => 'Post successfully deleted!',
                'status' => 'success'
            ]);
        }
    }


}
