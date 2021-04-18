<!DOCTYPE html>
<html class="min-h-screen antialiased" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @inject('my', 'App\Myself')
        <title>{{ $my->name }}</title>

        {{-- <link rel="shortcut icon" href="{{ asset(config('app.logo.light.icon')) }}" /> --}}

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ config('app.env') == 'production' ? 'https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap' : asset('vendor/source-code-pro/source-code-pro.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/main.css') }}">
    </head>
    <body class="min-h-screen font-mono bg-gray-800 light:bg-white text-white light:text-gray-700 text-base text-white px-5 md:px-10 pt-5 md:pt-10 leading-loose flex flex-col" data-controller="terminal">

        <header class="flex justify-between bg-gray-800 light:bg-white -mx-5 md:-mx-10 -mt-5 md:-mt-10 md:px-5">
            <a class="text-teal-400 light:text-gray-700 py-5 px-5" href="{{ url('/') }}" data-action="click->terminal#execute" data-terminal-input="intro">
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

            <a class="text-teal-400 light:text-gray-700 py-5 px-5" href="{{ url('menu') }}" data-action="click->terminal#execute" data-terminal-input="menu">
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

        <main class="flex-1" data-terminal-target="outputContainer">
            @yield('output')

            <p class="mt-8 italic text-gray-400 text-xs">For more information, hit <kbd class="border border-indigo-600 light:border-indigo-300 uppercase tracking-wide p-1 rounded">/</kbd>, type <a class="bg-gray-900 text-teal-400 light:bg-gray-100 light:text-teal-600 p-1" href="{{ url('help') }}" data-action="click->terminal#execute" data-terminal-input="help">help</a>, then hit <kbd class="border border-indigo-600 light:border-indigo-300 uppercase tracking-wide p-1 rounded">Enter</kbd><span class="text-red-400">.</span></p>
        </main>

        <form action="execute" class="mt-8 h-12 flex items-center -mx-5 md:-mx-10 px-5 md:px-10 focus-within:bg-gray-900 transition-colors" method="POST" data-action="submit->terminal#execute" defaultbutton="execute">
            @csrf
            
            @include('common.prompt')

            <input autocomplete="off" class="bg-transparent w-full px-2 focus:outline-none placeholder-gray-700 focus:placeholder-gray-600" data-action="keydown@document->terminal#listenToKeys" data-terminal-target="inputField" name="input" type="text" placeholder="Type `help` for more information">

            <a class="cursor-pointer uppercase tracking-wide border border-indigo-800 rounded text-indigo-200 text-xs px-3 py-1 mr-2 hover:text-white light:border-gray-200 light:text-gray-500 light:hover:text-gray-700" data-action="click->terminal#focus" href="javascript:void(0)" title="Press `/` to focus">/</a>

            <button class="uppercase tracking-wide bg-indigo-800 border border-indigo-800 rounded text-white text-xs px-3 py-1 hover:bg-blue-500 hover:border-blue-500 light:bg-gray-200 light:text-gray-600 light:border-gray-200 light:hover:bg-gray-300 light:hover:border-gray-300" id="execute" type="submit">Execute</button>
        </form>

        <footer class="flex items-center justify-between bg-gray-900 light:bg-gray-100 uppercase text-xs text-gray-700 light:text-gray-500 py-2 flex items-center -mx-5 md:-mx-10 px-5 md:px-10" data-controller="status">
            <span class="text-green-400 light:text-green-600 hidden" data-status-target="online">Online</span>
            <span class="text-red-400 light:text-red-600 hidden" data-status-target="offline">Offline</span>
            <span class="">&copy; Copyright {{ date('Y') }}</span>
        </footer>

        <script type="text/javascript" src="{{ mix('js/index.js') }}"></script>
    </body>
</html>
