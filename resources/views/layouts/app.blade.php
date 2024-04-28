<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles admin1234-->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="h-screen flex" x-data="{sidebar:true , mobile:false}">
            <div x-show="mobile" class="fixed md:hidden md:1/5 lg:w-1/6 h-screen w-full bg-white">
                <a
                    class="float-right cursor-pointer p-4"
                    x-on:click="mobile = !mobile">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
                {{--  Mobile Menu--}}
                @livewire('sidebar')
            </div>
            <div x-show="sidebar" class="hidden md:block md:1/5 lg:w-1/6">
            {{--   Side Bar--}}
                @livewire('sidebar')
            </div>

            <div class="flex-grow min-h-screen bg-gray-100">
                <div class="flex">
                    <div class="p-5 bg-white">
                        <a class="hidden md:block cursor-pointer" x-on:click="sidebar = !sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </a>

                        <a class="block md:hidden cursor-pointer" x-on:click="mobile = !mobile">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </a>

                    </div>
                    <div class="flex-grow">@livewire('navigation-menu')</div>
                </div>


                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>


        @stack('modals')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />

        @livewireScripts
    </body>
</html>
