@extends('pages.auth.layout')

@section('content')
    <div class="container auth">
        <div class="card auth">
            <div class="card-header">
                <span class="fw-bold fs-5">{{ __('auth.login') }}</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login.attempt') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('auth.email') }}</label>
                        <input id="email" type="email"
                            class="form-control bg-light @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('auth.password') }}</label>
                        <input id="password" type="password"
                            class="form-control bg-light @error('password') is-invalid @enderror" name="password"
                            value="" required autocomplete="password" autofocus>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.login') }}
                        </button>
                    </div>
            </div>
        </div>
    @endsection
