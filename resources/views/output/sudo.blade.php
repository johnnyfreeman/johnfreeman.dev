@php
    $url = session()->get('url.intended', 'sudo');
    $input = str_replace('/', ' ', parse_url($url, PHP_URL_PATH));
@endphp
<x-output :input="$input">
    <form action="{{ route('login') }}" class="w-full max-w-xl font-sans bg-white shadow p-6" method="POST">
        @csrf
        @honeypot

        <div class="space-y-6">
            <div class="flex space-x-4">
                <div class="shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500">
                    <x-icons.hand-point-up class="rotate-12 w-6 h-6 text-white light:text-blue-600" />
                </div>

                <div>
                    <h1 class="text-2xl font-bold mb-2 text-gray-800">Ah ah ah!</h1>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        This command requires elevated privileges. Please enter your sudo password to continue.
                    </p>
                </div>
            </div>

            <div class="w-full">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Sudo Password
                </label>

                <input class="appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" data-controller="autofocus" name="password" type="password" placeholder="*********">
                
                @error('password')
                    <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3 flex justify-between space-x-4 items-center">
                    <a data-turbo-stream class="inline-block tracking-wide text-blue-600 text-xs" href="{{ url('blank') }}">Nevermind</a>
                    
                    <button type="submit" class="font-semibold uppercase tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 shadow border border-purple-500 light:bg-blue-600 text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-4 py-3" data-form-target="submit">Continue</button>
                </div>
            </div>
        </div>
    </form>
</x-output>

<div id="input-form"></div>