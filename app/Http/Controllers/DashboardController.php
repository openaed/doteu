<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'months' => [
                __('date.January'),
                __('date.February'),
                __('date.March'),
                __('date.April'),
                __('date.May'),
                __('date.June'),
                __('date.July'),
                __('date.August'),
                __('date.September'),
                __('date.October'),
                __('date.November'),
                __('date.December')
            ],
            'postsPerMonth' => array_map(function($month) {
                return \App\Models\Post::whereMonth('published_at', $month)->whereYear('published_at', now()->year)->count();
            }, range(1, 12)),
        ]);
    }
}