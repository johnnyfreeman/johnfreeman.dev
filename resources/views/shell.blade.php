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
                <svg class="fill-current text-teal-400" width="30" height="39" viewBox="0 0 30 39" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.3478 0H12.7826V1.34483H11.3478V0Z" />
                    <path d="M14.2174 0H15.6522V1.34483H14.2174V0Z" />
                    <path d="M17.087 0H18.5217V1.34483H17.087V0Z" />
                    <path d="M11.3478 2.68966H12.7826V4.03448H11.3478V2.68966Z" />
                    <path d="M14.2174 2.68966H15.6522V4.03448H14.2174V2.68966Z" />
                    <path d="M17.087 2.68966H18.5217V4.03448H17.087V2.68966Z" />
                    <path d="M11.3478 5.37931H12.7826V6.72414H11.3478V5.37931Z" />
                    <path d="M14.2174 5.37931H15.6522V6.72414H14.2174V5.37931Z" />
                    <path d="M17.087 5.37931H18.5217V6.72414H17.087V5.37931Z" />
                    <path d="M11.3478 8.06896H12.7826V9.41379H11.3478V8.06896Z" />
                    <path d="M14.2174 8.06896H15.6522V9.41379H14.2174V8.06896Z" />
                    <path d="M17.087 8.06896H18.5217V9.41379H17.087V8.06896Z" />
                    <path d="M11.3478 10.7586H12.7826V12.1034H11.3478V10.7586Z" />
                    <path d="M14.2174 10.7586H15.6522V12.1034H14.2174V10.7586Z" />
                    <path d="M17.087 10.7586H18.5217V12.1034H17.087V10.7586Z" />
                    <path d="M11.3478 13.4483H12.7826V14.7931H11.3478V13.4483Z" />
                    <path d="M14.2174 13.4483H15.6522V14.7931H14.2174V13.4483Z" />
                    <path d="M17.087 13.4483H18.5217V14.7931H17.087V13.4483Z" />
                    <path d="M11.3478 16.1379H12.7826V17.4828H11.3478V16.1379Z" />
                    <path d="M14.2174 16.1379H15.6522V17.4828H14.2174V16.1379Z" />
                    <path d="M17.087 16.1379H18.5217V17.4828H17.087V16.1379Z" />
                    <path d="M11.3478 18.8276H12.7826V20.1724H11.3478V18.8276Z" />
                    <path d="M14.2174 18.8276H15.6522V20.1724H14.2174V18.8276Z" />
                    <path d="M17.087 18.8276H18.5217V20.1724H17.087V18.8276Z" />
                    <path d="M11.3478 21.5172H12.7826V22.8621H11.3478V21.5172Z" />
                    <path d="M14.2174 21.5172H15.6522V22.8621H14.2174V21.5172Z" />
                    <path d="M17.087 21.5172H18.5217V22.8621H17.087V21.5172Z" />
                    <path d="M11.3478 24.2069H12.7826V25.5517H11.3478V24.2069Z" />
                    <path d="M14.2174 24.2069H15.6522V25.5517H14.2174V24.2069Z" />
                    <path d="M17.087 24.2069H18.5217V25.5517H17.087V24.2069Z" />
                    <path d="M11.3478 26.8966H12.7826V28.2414H11.3478V26.8966Z" />
                    <path d="M14.2174 26.8966H15.6522V28.2414H14.2174V26.8966Z" />
                    <path d="M17.087 26.8966H18.5217V28.2414H17.087V26.8966Z" />
                    <path d="M11.3478 29.5862H12.7826V30.931H11.3478V29.5862Z" />
                    <path d="M14.2174 29.5862H15.6522V30.931H14.2174V29.5862Z" />
                    <path d="M17.087 29.5862H18.5217V30.931H17.087V29.5862Z" />
                    <path d="M11.3478 32.2759H12.7826V33.6207H11.3478V32.2759Z" />
                    <path d="M14.2174 32.2759H15.6522V33.6207H14.2174V32.2759Z" />
                    <path d="M17.087 32.2759H18.5217V33.6207H17.087V32.2759Z" />
                    <path d="M11.3478 34.9655H12.7826V36.3103H11.3478V34.9655Z" />
                    <path d="M14.2174 34.9655H15.6522V36.3103H14.2174V34.9655Z" />
                    <path d="M17.087 34.9655H18.5217V36.3103H17.087V34.9655Z" />
                    <path d="M11.3478 37.6552H12.7826V39H11.3478V37.6552Z" />
                    <path d="M14.2174 37.6552H15.6522V39H14.2174V37.6552Z" />
                    <path d="M17.087 37.6552H18.5217V39H17.087V37.6552Z" />
                    <path d="M0 37.6552H1.43478V39H0V37.6552Z" />
                    <path d="M2.86957 37.6552H4.30435V39H2.86957V37.6552Z" />
                    <path d="M5.73913 37.6552H7.17391V39H5.73913V37.6552Z" />
                    <path d="M8.6087 37.6552H10.0435V39H8.6087V37.6552Z" />
                    <path d="M0 34.9655H1.43478V36.3103H0V34.9655Z" />
                    <path d="M2.86957 34.9655H4.30435V36.3103H2.86957V34.9655Z" />
                    <path d="M5.73913 34.9655H7.17391V36.3103H5.73913V34.9655Z" />
                    <path d="M8.6087 34.9655H10.0435V36.3103H8.6087V34.9655Z" />
                    <path d="M0 32.2759H1.43478V33.6207H0V32.2759Z" />
                    <path d="M2.86957 32.2759H4.30435V33.6207H2.86957V32.2759Z" />
                    <path d="M5.73913 32.2759H7.17391V33.6207H5.73913V32.2759Z" />
                    <path d="M8.6087 32.2759H10.0435V33.6207H8.6087V32.2759Z" />
                    <path d="M19.9565 0H21.3913V1.34483H19.9565V0Z" />
                    <path d="M22.8261 0H24.2609V1.34483H22.8261V0Z" />
                    <path d="M25.6957 0H27.1304V1.34483H25.6957V0Z" />
                    <path d="M28.5652 0H30V1.34483H28.5652V0Z" />
                    <path d="M19.9565 2.68966H21.3913V4.03448H19.9565V2.68966Z" />
                    <path d="M22.8261 2.68966H24.2609V4.03448H22.8261V2.68966Z" />
                    <path d="M25.6957 2.68966H27.1304V4.03448H25.6957V2.68966Z" />
                    <path d="M28.5652 2.68966H30V4.03448H28.5652V2.68966Z" />
                    <path d="M19.9565 5.37931H21.3913V6.72414H19.9565V5.37931Z" />
                    <path d="M22.8261 5.37931H24.2609V6.72414H22.8261V5.37931Z" />
                    <path d="M25.6957 5.37931H27.1304V6.72414H25.6957V5.37931Z" />
                    <path d="M28.5652 5.37931H30V6.72414H28.5652V5.37931Z" />
                    <path d="M19.9565 13.4483H21.3913V14.7931H19.9565V13.4483Z" />
                    <path d="M22.8261 13.4483H24.2609V14.7931H22.8261V13.4483Z" />
                    <path d="M25.6957 13.4483H27.1304V14.7931H25.6957V13.4483Z" />
                    <path d="M28.5652 13.4483H30V14.7931H28.5652V13.4483Z" />
                    <path d="M19.9565 16.1379H21.3913V17.4828H19.9565V16.1379Z" />
                    <path d="M22.8261 16.1379H24.2609V17.4828H22.8261V16.1379Z" />
                    <path d="M25.6957 16.1379H27.1304V17.4828H25.6957V16.1379Z" />
                    <path d="M28.5652 16.1379H30V17.4828H28.5652V16.1379Z" />
                    <path d="M19.9565 18.8276H21.3913V20.1724H19.9565V18.8276Z" />
                    <path d="M22.8261 18.8276H24.2609V20.1724H22.8261V18.8276Z" />
                    <path d="M25.6957 18.8276H27.1304V20.1724H25.6957V18.8276Z" />
                    <path d="M28.5652 18.8276H30V20.1724H28.5652V18.8276Z" />
                </svg>
            </a>

            <a class="text-teal-400" href="{{ url('menu') }}" data-action="click->terminal#execute" data-terminal-input="menu">
                <svg class="fill-current" width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 0H4.43478V1.34483H3V0Z" />
                    <path d="M5.86957 0H7.30435V1.34483H5.86957V0Z" />
                    <path d="M8.73913 0H10.1739V1.34483H8.73913V0Z" />
                    <path d="M11.6087 0H13.0435V1.34483H11.6087V0Z" />
                    <path d="M3 4.68966H4.43478V6.03448H3V4.68966Z" />
                    <path d="M5.86957 4.68966H7.30435V6.03448H5.86957V4.68966Z" />
                    <path d="M8.73913 4.68966H10.1739V6.03448H8.73913V4.68966Z" />
                    <path d="M11.6087 4.68966H13.0435V6.03448H11.6087V4.68966Z" />
                    <path d="M3 9.37931H4.43478V10.7241H3V9.37931Z" />
                    <path d="M5.86957 9.37931H7.30435V10.7241H5.86957V9.37931Z" />
                    <path d="M8.73913 9.37931H10.1739V10.7241H8.73913V9.37931Z" />
                    <path d="M11.6087 9.37931H13.0435V10.7241H11.6087V9.37931Z" />
                    <path d="M0 0H1.43478V1.34483H0V0Z" />
                    <path d="M0 4.68966H1.43478V6.03448H0V4.68966Z" />
                    <path d="M0 9.37931H1.43478V10.7241H0V9.37931Z" />
                </svg>
            </a>
        </header>

        <main class="" data-target="terminal.output">
            @yield('output')

            {{-- <p class="mt-8 italic text-red-400 text-xs">Type <a class="bg-gray-900 text-teal-400 p-1" href="{{ url('help') }}" data-action="click->terminal#execute" data-terminal-input="help">help</a> and hit <span class="border border-indigo-600 uppercase tracking-wide p-1 rounded">Enter</span> for more information<span class="text-red-400">.</span></p> --}}
        </main>

        <form action="execute" class="mt-8 py-4 flex items-center sticky bottom-0 bg-indigo-900 text-white -mx-5 md:-mx-10 px-5 md:px-10" method="POST" data-action="submit->terminal#execute">
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
