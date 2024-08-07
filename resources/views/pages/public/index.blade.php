@extends('pages.public.layout')

@section('title', __('Home'))

@push('meta')
    <meta name="description" content="{{ __('pages/home.meta-description') }}">
    <meta property="og:title" content="{{ __('Home') }}">
    <meta property="og:description" content="{{ __('pages/home.meta-description') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:image" content="{{ asset('assets/branding/openaed_Logo.svg') }}">
@endpush

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
                        <div class="col hero-button px-5 py-4" onclick="window.location.href = '#newsletter'">
                            <i class="bi bi-newspaper fs-1 text-aed-green"></i>
                            <p>{{ __('pages/home.newsletter') }}</p>
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
            <h2 class="mt-5 text-center">{{ __('pages/home.latest-posts') }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
                @foreach ($posts as $post)
                    <x-public.post-card :post="$post" />
                @endforeach
            </div>
            @unless (count($posts) <= 3)
                <div class="text-center">
                    <a href="#" class="btn btn-light">{{ __('pages/home.view-all-posts') }}</a>
                </div>
            @elseif(count($posts) == 0)
                <p class="text-center">{{ __('pages/home.no-posts') }}</p>
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

        <section id="newsletter">
            <h2 class="mt-5 text-center">{{ __('pages/home.newsletter-title') }}</h2>
            <p class="text-center">{{ __('pages/home.newsletter-subtitle') }}</p>
            <form action="{{ route('newsletter.signup') }}" method="POST" class="row justify-content-center">
                @csrf
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control bg-light"
                            placeholder="{{ __('pages/home.email') }}" aria-label="{{ __('pages/home.email') }}" required>
                        <button class="btn btn-primary" type="submit">{{ __('pages/home.subscribe') }}</button>
                    </div>
                </div>

                @if (session('newsletter'))
                    <p class="text-center">{{ Session::get('newsletter') }}</p>
                @endif
            </form>
        </section>
    </div>
@endsection
