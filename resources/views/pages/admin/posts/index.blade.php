@extends('pages.admin.layout')

@section('title', __('Posts'))

@section('content')
    <h1>{{ __('Posts') }}</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus-lg"></i>
        {{ __('Add') }}</a>

    @if (count($posts) == 0)
        <p>{{ __('No :resource found', ['resource' => strtolower(__('Posts'))]) }}</p>
    @else
        <p>{{ __(':count results', ['count' => count($posts)]) }}</p>
    @endif

    <div class="row row-cols-4">
        @foreach ($posts as $post)
            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="p-0 text-decoration-none text-dark">
                <div class="admin-post">
                    @php
                        $published_at = Carbon\Carbon::parse($post->published_at);
                        $excerpt = $post->excerpt();
                    @endphp
                    <b>{{ $post->title }}</b>
                    <p class="text-muted"><i>{{ $excerpt }}</i></p>
                    <p>{{ __('by') }} {{ $post->user->name }} &centerdot;
                        <time datetime="{{ $published_at->isoFormat('L') }}"
                            title="{{ $published_at->isoFormat('L') }}">{{ $published_at->isoFormat('LL') }}</time>
                    </p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
