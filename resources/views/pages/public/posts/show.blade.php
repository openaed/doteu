@extends('pages.public.layout')

@section('title', $post->title)

@push('meta')
    <meta name="description" content="{{ $post->excerpt() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt() }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('posts.show', $post) }}">
    <meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}">
@endpush

@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}" class="text-muted link-body-emphasis">
            <i class="bi bi-arrow-left-short"></i> {{ __('Back') }}
        </a>
        <h1 class="text-center mb-3">
            {{ $post->title }}
        </h1>

        <small class="d-block text-center mb-5">
            {{ $post->created_at->isoFormat('LL') }}
        </small>

        <div class="text-center">
            @markdown($post->content)
        </div>
    </div>
@endsection
