<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the public home page.
     */
    public function index()
    {
        return view('pages.public.index', [
            'posts' => Post::latest()->limit(3)->get(),
        ]);
    }

}