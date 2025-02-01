<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ open: false }">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config("app.name") }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles @vite('resources/css/app.css')
    </head>

    <body class="antialiased">
        <!-- Navbar -->
        <nav class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                    >
                        <!-- Mobile menu button-->
                        <button
                            type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false"
                            @click="open = !open"
                        >
                            <span class="sr-only">Open main menu</span>
                            <!-- Icon when menu is closed. -->
                            <!-- Heroicon name: menu -->
                            <svg
                                class="block h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7"
                                />
                            </svg>
                            <!-- Icon when menu is open. -->
                            <svg
                                class="hidden h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start"
                    >
                        <div class="flex-shrink-0">
                            <a
                                href="{{ url('/') }}"
                                class="text-xl font-bold text-gray-900 dark:text-white"
                            >
                                {{ config("app.name") }}
                            </a>
                        </div>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a
                                    href="{{ url('/') }}"
                                    class="text-gray-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium"
                                    >Home</a
                                >
                                <a
                                    href="{{ url('/categories') }}"
                                    class="text-gray-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium"
                                    >Categories</a
                                >
                                <a
                                    href="{{ url('/posts') }}"
                                    class="text-gray-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium"
                                    >Posts</a
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Desktop only auth routes links -->
                    <div class="hidden md:block sm:ml-6">
                        @if (Route::has('filament.admin.auth.login'))
                            @auth
                                <a
                                    href="{{ url('/admin') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 20a8 8 0 100-16 8 8 0 000 16zm1-11V5a1 1 0 10-2 0v4H5a1 1 0 100 2h4v4a1 1 0 102 0v-4h4a1 1 0 100-2h-4z" />
                                    </svg>
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('filament.admin.auth.login') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex gap-3"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                    </svg>

                                    Log in
                                </a>
                            @endauth
                        @endif
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                        :class="{'block': open, 'hidden': !open}"
                    >
                        @if (Route::has('filament.admin.auth.login'))
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="text-gray-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium"
                                    >Dashboard</a
                                >
                            @else
                                <a
                                    href="{{ route('filament.admin.auth.login') }}"
                                    class="text-gray-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium"
                                    >Log in</a
                                >
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-4 my-5">@yield('content')</div>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 shadow mt-10">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <p class="text-gray-900 dark:text-white">
                            © {{ date("Y") }} {{ config("app.name") }}. All
                            rights reserved.
                        </p>
                    </div>
                    <div class="flex items-center">
                        <a
                            href="https://github.com/ManiruzzamanAkash"
                            class="text-gray-900 dark:text-white"
                        >
                            Made with ❤️ by Maniruzzaman Akash
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        @filamentScripts @vite('resources/js/app.js')
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
