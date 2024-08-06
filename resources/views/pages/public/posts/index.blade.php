@extends('pages.public.layout')

@section('title', __('Posts'))

@push('meta')
    <meta name="description" content="{{ __('pages/posts.meta-description') }}">
    <meta property="og:title" content="{{ __('Posts') }}">
    <meta property="og:description" content="{{ __('pages/posts.meta-description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('posts.index') }}">
    <meta property="og:image" content="{{ asset('assets/branding/openaed_Logo.svg') }}">
@endpush

@section('content')
    <div class="container">
        <h1>{{ __('Posts') }}</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @foreach ($posts as $post)
                <x-public.post-card :post="$post" />
            @endforeach
        </div>

        @if (count($posts) == 0)
            <p>{{ __('pages/home.no-posts') }}</p>
        @endunless
</div>
@endsection
