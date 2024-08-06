<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display the public home page.
     */
    public function index()
    {
        return view('pages.public.posts.index', [
            'posts' => Post::latest()->get(),
        ]);
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        return view('pages.public.posts.show', [
            'post' => $post,
        ]);
    }
}