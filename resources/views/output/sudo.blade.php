@php
    $url = session()->get('url.intended', 'sudo');
    $input = str_replace('/', ' ', parse_url($url, PHP_URL_PATH));
@endphp
<div data-controller="form output" data-terminal-target="output">
    @include('common.input', compact('input'))

    <form action="{{ route('login') }}" class="w-full max-w-xs font-sans bg-white rounded-lg shadow p-6" data-action="submit->form#submit" data-form-target="form" method="POST">
        @csrf
        @honeypot

        <div class="w-full mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Sudo Password
            </label>

            <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" data-controller="autofocus" name="password" type="password" data-action="keypress->form#submitIfEnter">

            @error('password')
            <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </form>
</div>
