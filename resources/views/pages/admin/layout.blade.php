<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>

<body class="bg-light">

    <div class="row min-vh-100 h-100 overflow-y-hidden">
        <div class="col-2 bg-dark">
            <div class="container mt-3">
                <div class="sidebar-menu">
                    @php
                        $activeRoute = Route::is('admin.dashboard') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.dashboard') }}" class="menu-item {{ $activeRoute }}"><i
                            class="bi bi-house-door-fill"></i>&nbsp;{{ __('Dashboard') }}</a>

                    @php
                        $activeRoute = Route::is('admin.posts.*') ? 'active' : '';
                    @endphp
                    <a href="{{ route('admin.posts.index') }}" class="menu-item {{ $activeRoute }}"><i
                            class="bi bi-file-text-fill"></i>&nbsp;{{ __('Posts') }}</a>

                    <a href="{{ route('admin.logout') }}" class="menu-item"><i
                            class="bi bi-box-arrow-left"></i>&nbsp;{{ __('auth.logout') }}</a>
                </div>
            </div>
        </div>
        <div class="col-10 overflow-y-auto pt-4 pb-4">
            <div class="px-5">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')

</body>

</html>
