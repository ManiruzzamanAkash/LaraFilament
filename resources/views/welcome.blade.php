@extends('components.layouts.app') @section('content')
<!-- Main Content -->
<div
    class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
>
    <div class="relative w-full max-w-7xl px-6 lg:px-8">
        <main class="mt-6">
            <!-- Categories Section -->
            <section class="mb-12">
                <h2
                    class="text-2xl font-semibold text-gray-900 dark:text-white mb-4"
                >
                    Categories
                </h2>
                <div class="grid gap-6 lg:grid-cols-3">
                    @foreach ($categories as $category)
                    <a
                        href="{{ url('/categories/' . $category->slug) }}"
                        class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        @if ($category->image)
                        <img
                            src="{{ asset('storage/' . $category->image) }}"
                            alt="{{ $category->name }}"
                            class="w-full h-40 object-cover rounded-lg mb-4"
                        />
                        @endif
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            {{ $category->name }}
                        </h3>
                    </a>
                    @endforeach
                </div>
            </section>

            <!-- Latest Posts Section -->
            <section>
                <h2
                    class="text-2xl font-semibold text-gray-900 dark:text-white mb-4"
                >
                    Latest Posts
                </h2>
                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($posts as $post)
                    <a
                        href="{{ url('/posts/' . $post->slug) }}"
                        class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        @if($post->featured_image)
                        <div class="mb-4">
                            <img
                                src="{{ asset('storage/' . $post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-auto rounded-lg"
                            />
                        </div>
                        @endif
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-white"
                        >
                            {{ $post->title }}
                        </h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            {{ Str::limit($post->content, 150) }}
                        </p>
                        <div
                            class="mt-4 text-sm text-gray-500 dark:text-gray-400"
                        >
                            <span>By {{ $post->author->name }}</span>
                            |
                            <span
                                >{{ $post->published_at->format('M d, Y') }}</span
                            >
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- All Posts Link -->
                <div class="mt-6 text-center">
                    <a
                        href="{{ url('/posts') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition duration-300 ease-in-out"
                    >
                        View All Posts
                        <svg
                            class="ml-2 w-4 h-4 animate-bounce"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7"
                            ></path>
                        </svg>
                    </a>
                </div>
            </section>
        </main>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            <p>&copy; {{ date("Y") }} Your Company. All rights reserved.</p>
        </footer>
    </div>
</div>
@endsection
