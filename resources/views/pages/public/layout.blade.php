<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="/assets/branding/openaed_Favicon.ico" type="image/x-icon">

    @stack('meta')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @stack('styles')

</head>

<body class="public">

    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-bold" href="{{ route('home') }}">
                    <img src="/assets/branding/openaed_Woordmerk.svg" alt="OpenAED logo" height="75"
                        class="user-select-none">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('posts.index') }}">{{ __('Posts') }}</a>
                        </li>
                    </ul>
                    <div id="lang-switch" class="d-flex ms-auto lang-switch-container">
                        <div class="dropdown">
                            <div class="current text-nowrap" data-bs-toggle="dropdown">
                                <img src="/assets/flags/{{ app()->getLocale() }}.svg" alt="Language flag">
                                <span class="text-uppercase">{{ app()->getLocale() }}</span>
                                <i class="bi bi-caret-down-fill"></i>
                            </div>
                            <ul class="lang-dropdown dropdown-menu">
                                @foreach (config('app.languages') as $abbr => $locale)
                                    <li>
                                        <a href="{{ route('setLanguage', $abbr) }}"
                                            class="text-decoration-none text-black">
                                            <img src="/assets/flags/{{ $abbr }}.svg" alt="Language flag">
                                            <span>{{ $locale }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container pt-3 mb-5">
        @yield('content')
    </div>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="/assets/branding/openaed_Woordmerk.svg" alt="OpenAED logo" height="75">
                </a>
                <p class="text-body-secondary">© 2024</p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5 id="maps">{{ __('Maps') }}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://openaed.nl" target="_blank"
                            class="nav-link p-0 text-body-secondary">{{ __('countries.Netherlands') }}</a></li>
                    <li class="nav-item mb-2"><a href="https://openaed.org.uk" target="_blank"
                            class="nav-link p-0 text-body-secondary">{{ __('countries.United Kingdom') }}</a>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>{{ __('More information') }}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://status.openaed.eu" target="_blank"
                            class="nav-link p-0 text-body-secondary">Server status</a></li>
                </ul>
            </div>
        </footer>
    </div>

    @stack('scripts')

</body>

</html>
