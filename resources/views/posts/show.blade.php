@extends('components.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ $post->title }}</h1>
    <div class="text-gray-600 dark:text-gray-400 mb-6">
        <span>By {{ $post->author->name }}</span> | <span>{{ $post->published_at->format('M d, Y') }}</span>
    </div>
    @if($post->featured_image)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg">
        </div>
    @endif
    <div class="prose dark:prose-dark">
        {!! nl2br(e($post->content)) !!}
    </div>
</div>
@endsection
