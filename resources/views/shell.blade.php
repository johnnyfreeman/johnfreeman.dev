<!DOCTYPE html>
<html class="min-h-screen antialiased" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>John Freeman</title>

        {{-- <link rel="shortcut icon" href="{{ asset(config('app.logo.light.icon')) }}" /> --}}

        <!-- Styles -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendor/source-code-pro/source-code-pro.css') }}"> --}}
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/main.css') }}">
    </head>
    <body class="min-h-screen font-mono bg-indigo-900 text-white text-base text-white px-5 md:px-10 pt-5 md:pt-10 leading-loose" data-controller="terminal">

        <header class="flex justify-between pb-8">
            <a class="text-teal-400" href="{{ url('/') }}" data-action="click->terminal#execute" data-terminal-input="intro">
                <svg class="fill-current text-teal-400" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.93478 0H7.36957V1.34483H5.93478V0Z" fill="#4FD1C5"/>
                    <path d="M8.73913 0H10.1739V1.34483H8.73913V0Z" fill="#4FD1C5"/>
                    <path d="M11.6087 0H13.0435V1.34483H11.6087V0Z" fill="#4FD1C5"/>
                    <path d="M5.93478 5.68966H7.36957V7.03448H5.93478V5.68966Z" fill="#4FD1C5"/>
                    <path d="M8.73913 5.68966H10.1739V7.03448H8.73913V5.68966Z" fill="#4FD1C5"/>
                    <path d="M11.6087 5.68966H13.0435V7.03448H11.6087V5.68966Z" fill="#4FD1C5"/>
                    <path d="M3 11.3793H4.43478V12.7241H3V11.3793Z" fill="#4FD1C5"/>
                    <path d="M5.93478 11.3793H7.36957V12.7241H5.93478V11.3793Z" fill="#4FD1C5"/>
                    <path d="M5.93478 3H7.36957V4.34483H5.93478V3Z" fill="#4FD1C5"/>
                    <path d="M5.93478 8.68966H7.36957V10.0345H5.93478V8.68966Z" fill="#4FD1C5"/>
                    <path d="M0 11.3793H1.43478V12.7241H0V11.3793Z" fill="#4FD1C5"/>
                </svg>
            </a>

            <a class="text-teal-400" href="{{ url('menu') }}" data-action="click->terminal#execute" data-terminal-input="menu">
                <svg class="fill-current" width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 0H4.43478V1.34483H3V0Z" fill="#4FD1C5"/>
                    <path d="M5.86957 0H7.30435V1.34483H5.86957V0Z" fill="#4FD1C5"/>
                    <path d="M8.73913 0H10.1739V1.34483H8.73913V0Z" fill="#4FD1C5"/>
                    <path d="M11.6087 0H13.0435V1.34483H11.6087V0Z" fill="#4FD1C5"/>
                    <path d="M3 5.68966H4.43478V7.03448H3V5.68966Z" fill="#4FD1C5"/>
                    <path d="M5.86957 5.68966H7.30435V7.03448H5.86957V5.68966Z" fill="#4FD1C5"/>
                    <path d="M8.73913 5.68966H10.1739V7.03448H8.73913V5.68966Z" fill="#4FD1C5"/>
                    <path d="M11.6087 5.68966H13.0435V7.03448H11.6087V5.68966Z" fill="#4FD1C5"/>
                    <path d="M3 11.3793H4.43478V12.7241H3V11.3793Z" fill="#4FD1C5"/>
                    <path d="M5.86957 11.3793H7.30435V12.7241H5.86957V11.3793Z" fill="#4FD1C5"/>
                    <path d="M8.73913 11.3793H10.1739V12.7241H8.73913V11.3793Z" fill="#4FD1C5"/>
                    <path d="M11.6087 11.3793H13.0435V12.7241H11.6087V11.3793Z" fill="#4FD1C5"/>
                    <path d="M0 0H1.43478V1.34483H0V0Z" fill="#4FD1C5"/>
                    <path d="M0 5.68966H1.43478V7.03448H0V5.68966Z" fill="#4FD1C5"/>
                    <path d="M0 11.3793H1.43478V12.7241H0V11.3793Z" fill="#4FD1C5"/>
                </svg>
            </a>
        </header>

        <main class="" data-target="terminal.output">
            @yield('output')

            {{-- <p class="mt-8 italic text-red-400 text-xs">Type <a class="bg-gray-900 text-teal-400 p-1" href="{{ url('help') }}" data-action="click->terminal#execute" data-terminal-input="help">help</a> and hit <span class="border border-indigo-600 uppercase tracking-wide p-1 rounded">Enter</span> for more information<span class="text-red-400">.</span></p> --}}
        </main>

        <form action="execute" class="mt-8 py-4 flex items-center {{-- sticky bottom-0 --}} bg-indigo-900 text-white -mx-5 md:-mx-10 px-5 md:px-10" method="POST" data-action="submit->terminal#execute">
            @csrf
            <span class="font-bold text-yellow-400">$</span>

            <input autocomplete="off" class="bg-transparent w-full px-2" data-action="keydown@document->terminal#focus" data-target="terminal.input" name="input" type="text" placeholder="Type `help` for more information">

            <span class="uppercase tracking-wide border border-indigo-800 rounded text-indigo-200 text-xs px-3 py-1 mr-2">/</span>

            <button type="submit" class="uppercase tracking-wide bg-indigo-800 border border-indigo-800 rounded text-white text-xs hover:bg-blue-500 px-3 py-1">Execute</button>
        </form>

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
