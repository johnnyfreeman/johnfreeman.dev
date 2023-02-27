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
    <body class="min-h-screen font-mono bg-gray-800 light:bg-white text-white light:text-gray-700 text-base px-5 md:px-10 pt-5 md:pt-10 leading-loose flex flex-col" data-controller="terminal">
        <header class="sticky top-0 flex justify-between z-10 bg-gray-800 light:bg-white -mx-5 md:-mx-10 -mt-5 md:-mt-10 md:px-5">
            <a data-turbo-stream class="text-teal-400 light:text-gray-700 py-5 px-5" href="{{ url('/') }}" data-terminal-input="intro">
                <svg class="fill-current" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.93478 0H7.36957V1.34483H5.93478V0Z"/>
                    <path d="M8.73913 0H10.1739V1.34483H8.73913V0Z"/>
                    <path d="M11.6087 0H13.0435V1.34483H11.6087V0Z"/>
                    <path d="M5.93478 5.68966H7.36957V7.03448H5.93478V5.68966Z"/>
                    <path d="M8.73913 5.68966H10.1739V7.03448H8.73913V5.68966Z"/>
                    <path d="M11.6087 5.68966H13.0435V7.03448H11.6087V5.68966Z"/>
                    <path d="M3 11.3793H4.43478V12.7241H3V11.3793Z"/>
                    <path d="M5.93478 11.3793H7.36957V12.7241H5.93478V11.3793Z"/>
                    <path d="M5.93478 3H7.36957V4.34483H5.93478V3Z"/>
                    <path d="M5.93478 8.68966H7.36957V10.0345H5.93478V8.68966Z"/>
                    <path d="M0 11.3793H1.43478V12.7241H0V11.3793Z"/>
                </svg>
            </a>

            <a data-turbo-stream class="text-teal-400 light:text-gray-700 py-5 px-5" href="{{ url('menu') }}" data-terminal-input="menu">
                <svg class="fill-current" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 0H4.43478V1.34483H3V0Z"/>
                    <path d="M5.86957 0H7.30435V1.34483H5.86957V0Z"/>
                    <path d="M8.73913 0H10.1739V1.34483H8.73913V0Z"/>
                    <path d="M11.6087 0H13.0435V1.34483H11.6087V0Z"/>
                    <path d="M3 5.68966H4.43478V7.03448H3V5.68966Z"/>
                    <path d="M5.86957 5.68966H7.30435V7.03448H5.86957V5.68966Z"/>
                    <path d="M8.73913 5.68966H10.1739V7.03448H8.73913V5.68966Z"/>
                    <path d="M11.6087 5.68966H13.0435V7.03448H11.6087V5.68966Z"/>
                    <path d="M3 11.3793H4.43478V12.7241H3V11.3793Z"/>
                    <path d="M5.86957 11.3793H7.30435V12.7241H5.86957V11.3793Z"/>
                    <path d="M8.73913 11.3793H10.1739V12.7241H8.73913V11.3793Z"/>
                    <path d="M11.6087 11.3793H13.0435V12.7241H11.6087V11.3793Z"/>
                    <path d="M0 0H1.43478V1.34483H0V0Z"/>
                    <path d="M0 5.68966H1.43478V7.03448H0V5.68966Z"/>
                    <path d="M0 11.3793H1.43478V12.7241H0V11.3793Z"/>
                </svg>
            </a>
        </header>

        <main class="flex-1" data-terminal-target="outputContainer" id="output">
            @yield('output')
        </main>

        <footer class="sticky bottom-0 flex items-center justify-between bg-gray-900 light:bg-gray-100 uppercase text-xs text-gray-700 light:text-gray-500 py-2 -mx-5 md:-mx-10 px-5 md:px-10" data-controller="status">
            <span class="text-green-400 light:text-green-600 hidden" data-status-target="online">Online</span>
            <span class="text-red-400 light:text-red-600 hidden" data-status-target="offline">Offline</span>
            <span class="">&copy; Copyright {{ date('Y') }}</span>
        </footer>
    </body>
</html>
