@extends('pages.public.layout')

@section('title', __('Home'))

@section('content')
    <div class="container">
        <div class="row gy-3">
            <div class="col-12 col-md-5 order-md-2">
                <div class="h-100 rounded-5 bg-aed-header" style="background-image: url('/assets/aed-header.jpg')">
                </div>
            </div>
            <div class="col-12 col-md-7 order-md-1">
                <div class="bg-white p-3 rounded-5">
                    <h2>{{ __('pages/home.hero-title') }}</h2>
                    <p class="fs-5">{{ __('pages/home.hero-subtitle') }}</p>

                    <p>{!! __('pages/home.hero-text') !!}</p>


                    <small class="fs-italic text-muted">{{ __('pages/home.hero-disclaimer') }}</small>
                </div>

                <div class="bg-white rounded-5 mt-3 overflow-hidden">
                    <div class="row row-cols-1 row-cols-md-3 h-100 w-100">
                        <div class="col hero-button px-5 py-4" onclick="window.location.href = '#what-is-aed'">
                            <i class="bi bi-heart-pulse fs-1 text-aed-green"></i>
                            <p>{{ __('pages/home.what-is-aed') }}</p>
                        </div>
                        <div class="col hero-button px-5 py-4" onclick="window.location.href = '#maps'">
                            <i class="bi bi-map fs-1 text-aed-green"></i>
                            <p>{{ __('pages/home.to-map') }}</p>
                        </div>
                        <div class="col hero-button px-5 py-4" onclick="">
                            <i class="bi bi-question fs-1 text-aed-green"></i>
                            <p>{{ __('pages/home.to-map') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="what-is-aed">
            <h2 class="mt-5">{{ __('pages/home.what-is-aed') }}</h2>
            <div class="row">
                <div class="col-12 col-md-4 order-2 order-md-1">
                    <div class="h-100 rounded-5 bg-what-is-aed" style="background-image: url('/assets/defibtech-aed.jpg')">
                    </div>
                </div>
                <div class="col-12 col-md-8 order-md-2">
                    <p>{!! __('pages/home.what-is-aed-text') !!}</p>
                </div>
            </div>
        </section>

        <section id="posts">
            <h2 class="mt-5">{{ __('pages/home.latest-posts') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card mb-3 bg-light rounded-5 overflow-hidden">
                            {{-- <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}"> --}}
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <p class="card-text text-break">{{ $post->excerpt(100) }}</p>
                                <a href="#" class="btn btn-primary">{{ __('pages/home.read-more') }}</a>

                                <p class="card-text mt-3">
                                    <small class="text-muted">
                                        {{ Carbon\Carbon::parse($post->published_at)->isoFormat('LL') }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @unless (count($posts) >= 3)
                <div class="text-center">
                    <a href="#" class="btn btn-light">{{ __('pages/home.view-all-posts') }}</a>
                </div>
            @else
                <p>{{ __('pages/home.no-posts') }}</p>
            @endunless
        </section>

        <section id="help">
            <h2 class="mt-5 text-center">{{ __('pages/home.how-can-i-help') }}</h2>
            <div class="row row-cols-1 row-cols-md-3 gy-4">
                <div class="col text-center">
                    <i class="bi bi-map d-block fs-1"></i>
                    <span class="fs-4">{{ __('pages/home.how-can-i-help-map-title') }}</span>
                    <p>{!! __('pages/home.how-can-i-help-map-text') !!}</p>
                    <a target="_blank"
                        href="https://wiki.openstreetmap.org/wiki/How_to_contribute">{{ __('More information') }}</a>
                </div>
                <div class="col text-center">
                    <i class="bi bi-heart-pulse d-block fs-1"></i>
                    <span class="fs-4">{{ __('pages/home.how-can-i-help-learn-cpr-title') }}</span>
                    <p>{!! __('pages/home.how-can-i-help-learn-cpr-text') !!}</p>
                </div>
                <div class="col text-center">
                    <i class="bi bi-megaphone d-block fs-1"></i>
                    <span class="fs-4">{{ __('pages/home.how-can-i-help-tell-others-title') }}</span>
                    <p>{!! __('pages/home.how-can-i-help-tell-others-text') !!}</p>
                </div>
            </div>
        </section>
    </div>
@endsection
