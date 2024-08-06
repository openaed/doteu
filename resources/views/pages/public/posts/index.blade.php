@extends('pages.public.layout')

@section('title', __('Posts'))

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
