<!DOCTYPE html>
<html class="min-h-screen antialiased" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @inject('my', 'App\Myself')
        <title>{{ $my->name }}</title>

        {{-- <link rel="shortcut icon" href="{{ asset(config('app.logo.light.icon')) }}" /> --}}

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ config('app.env') == 'production' ? 'https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap' : asset('vendor/source-code-pro/source-code-pro.css') }}">

        @vite(['resources/css/main.css', 'resources/js/index.js'])
    </head>
    <body class="min-h-screen font-mono bg-nosferatu-900 light:bg-white text-white light:text-nostifaru-700 text-base px-5 md:px-10 pt-5 md:pt-10 leading-loose flex flex-col" data-controller="terminal">
        <header class="sticky top-0 flex justify-between z-10 bg-nosferatu/70 backdrop-blur light:bg-white -mx-5 md:-mx-10 -mt-5 md:-mt-10 md:px-5">
            <a data-turbo-stream class="text-buffy-400 light:text-nostifaru-700 py-5 px-5" href="{{ url('/') }}" data-terminal-input="intro">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="4" y="0" width="1" height="1" />
                    <rect x="6" y="0" width="1" height="1" />
                    <rect x="8" y="0" width="1" height="1" />
                    <rect x="4" y="2" width="1" height="1" />
                    <rect x="4" y="4" width="1" height="1" />
                    <rect x="6" y="4" width="1" height="1" />
                    <rect x="8" y="4" width="1" height="1" />
                    <rect x="4" y="6" width="1" height="1" />
                    <rect x="4" y="8" width="1" height="1" />
                    <rect x="2" y="8" width="1" height="1" />
                    <rect x="0" y="8" width="1" height="1" />
                </svg>
            </a>

            <a data-turbo-stream class="text-buffy-400 light:text-nostifaru-700 py-5 px-5" href="{{ url('menu') }}" data-terminal-input="menu">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0" y="0" width="1" height="1" />
                    <rect x="2" y="0" width="1" height="1" />
                    <rect x="4" y="0" width="1" height="1" />
                    <rect x="6" y="0" width="1" height="1" />
                    <rect x="8" y="0" width="1" height="1" />

                    <rect x="0" y="4" width="1" height="1" />
                    <rect x="2" y="4" width="1" height="1" />
                    <rect x="4" y="4" width="1" height="1" />
                    <rect x="6" y="4" width="1" height="1" />
                    <rect x="8" y="4" width="1" height="1" />

                    <rect x="0" y="8" width="1" height="1" />
                    <rect x="2" y="8" width="1" height="1" />
                    <rect x="4" y="8" width="1" height="1" />
                    <rect x="6" y="8" width="1" height="1" />
                    <rect x="8" y="8" width="1" height="1" />
                </svg>
            </a>
        </header>

        <main class="flex-1" data-terminal-target="outputContainer" id="output">
            @yield('output')
        </main>

        <footer class="mt-8 sticky bottom-4 uppercase text-xs font-bold text-nostifaru-700 light:text-nostifaru-500 -mx-5 md:-mx-10" data-controller="status">
            <div class="w-full flex items-center justify-between bg-nosferatu-800/70 backdrop-blur light:bg-nostifaru-100 px-5 md:px-10">
                <span class="flex items-center px-2 h-6 bg-blade-400 light:bg-blade-600 text-blade-900 hidden" data-status-target="online">Online</span>
                <span class="flex items-center px-2 h-6 bg-marcelin light:bg-marcelin-600 text-white hidden" data-status-target="offline">Offline</span>
                <span class="">&copy; Copyright {{ date('Y') }}</span>
            </div>
        </footer>
    </body>
</html>
