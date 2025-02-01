@extends('components.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Blog Posts</h1>
    <div class="grid gap-6 lg:grid-cols-2">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                @if($post->featured_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg">
                    </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ Str::limit($post->content, 150) }}</p>
                <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                    <span>By {{ $post->author->name }}</span> | <span>{{ $post->published_at->format('M d, Y') }}</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
