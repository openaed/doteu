<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.posts.index', [
            'posts' => Post::orderBy('published_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);


        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('images');
        }

        Post::create([
            'title' => $attributes['title'],
            'slug' => $attributes['slug'],
            'content' => $attributes['content'],
            'image' => $attributes['image'] ?? null,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('pages.admin.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('images');
        }

        $post->update([
            'title' => $attributes['title'],
            'content' => $attributes['content'],
            'image' => $attributes['image'] ?? $post->image,
        ]);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}