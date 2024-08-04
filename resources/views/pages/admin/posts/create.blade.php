@extends('pages.admin.layout')

@section('title', __('Add :resource', ['resource' => __('Post')]))

@section('content')
    <h1>{{ __('Add :resource', ['resource' => __('Post')]) }}</h1>

    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i>
        {{ __('Back') }}</a>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">{{ __('posts.title') }}</label>
            <input type="text" class="form-control bg-light" id="title" name="title" value="{{ old('title') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">{{ __('posts.slug') }}</label>
            <input type="text" class="form-control bg-light" id="slug" name="slug" value="{{ old('slug') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="post-content" class="form-label">{{ __('posts.content') }}</label>
            <textarea class="form-control bg-light" id="post-content" name="content" rows="12" value="{{ old('content') }}"
                required></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="{{ __('Save') }}">


    </form>

@endsection
