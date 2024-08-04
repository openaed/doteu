@extends('pages.admin.layout')

@section('title', __('Dashboard'))

@section('content')
    <h1>{{ __('Welcome') }}, {{ auth()->user()->name }}</h1>
    <div class="row row-cols-4">
        <div class="col">
            <span>{{ __(':resource per :frequency', ['resource' => __('Posts'), 'frequency' => __('date.month')]) }}</span>
            <canvas id="chart-posts"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartPostsCtx = document.querySelector('#chart-posts');

        new Chart(chartPostsCtx, {
            type: 'line',
            data: {
                labels: [{!! implode(
                    ', ',
                    array_map(function ($month) {
                        return "\"$month\"";
                    }, $months),
                ) !!}],
                datasets: [{
                    label: '{{ __('Posts') }}',
                    data: [{{ implode(', ', $postsPerMonth) }}],
                    fill: false,
                    borderColor: '#009a3b',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                aspectRatio: 1
            }
        })
    </script>
@endpush
