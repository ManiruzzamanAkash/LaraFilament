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
                    <div class="hidden md:flex sm:ml-6 gap-10">
                        <!-- Github Icon and Link -->
                        <a
                            href="https://github.com/ManiruzzamanAkash/LaraFilament"
                            class="text-black hover:text-blue-600 dark:text-white px-3 py-2 rounded-md text-2xl font-medium mt-1"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                            </svg>
                        </a>

                        @if (Route::has('filament.admin.auth.login'))
                            @auth
                                <a
                                    href="{{ url('/admin') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex gap-3"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
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
