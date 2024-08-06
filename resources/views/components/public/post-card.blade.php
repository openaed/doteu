@props(['post'])

<div class="col">
    <div class="card mb-3 bg-light rounded-5 overflow-hidden">
        {{-- <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}"> --}}
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text text-break">{{ $post->excerpt(100) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">{{ __('pages/home.read-more') }}</a>

            <p class="card-text mt-3">
                <small class="text-muted">
                    {{ Carbon\Carbon::parse($post->published_at)->isoFormat('LL') }}</small>
            </p>
        </div>
    </div>
</div>
