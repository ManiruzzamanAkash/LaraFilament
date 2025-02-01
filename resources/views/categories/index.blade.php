@extends('components.layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Categories</h1>
    <div class="grid gap-6 lg:grid-cols-3">
        @foreach ($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                @if ($category->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-auto rounded-lg" />
                </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $category->name }}</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $category->description }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
