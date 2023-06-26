@props(['cache' => true, 'value'])
<div class="group mt-8 text-vanHelsing light:text-dracula-600 h-12 flex items-center -mx-5 md:-mx-10 px-5 md:px-10" data-controller="clipboard">
    <x-prompt />

    <input autocomplete="off" class="bg-transparent w-full px-2 focus:outline-none" {{ $cache ? 'data-output-target="cache"' : '' }} data-terminal-target="history" data-clipboard-target="copyable" readonly name="input" type="text" value="{{ $value }}">

    <a class="hidden group-hover:inline-block uppercase tracking-wide bg-dracula-600 border border-dracula-600 rounded text-white text-xs px-3 py-1 hover:bg-blue-400 hover:border-blue-400 light:bg-nosferatu-200 light:text-nosferatu-600 light:border-nosferatu-200 light:hover:bg-nosferatu-300 light:hover:border-nosferatu-300 mr-1" href="javascript:void(0)" data-action="click->clipboard#copy">Copy</a>

    <a class="hidden group-hover:inline-block uppercase tracking-wide bg-dracula-600 border border-dracula-600 rounded text-white text-xs px-3 py-1 hover:bg-blue-400 hover:border-blue-400 light:bg-nosferatu-200 light:text-nosferatu-600 light:border-nosferatu-200 light:hover:bg-nosferatu-300 light:hover:border-nosferatu-300 mr-1" href="{{ url($value) }}">Link</a>

    <a data-turbo-stream class="hidden group-hover:inline-block uppercase tracking-wide bg-dracula-600 border border-dracula-600 rounded text-white text-xs px-3 py-1 hover:bg-blue-400 hover:border-blue-400 light:bg-nosferatu-200 light:text-nosferatu-600 light:border-nosferatu-200 light:hover:bg-nosferatu-300 light:hover:border-nosferatu-300" href="{{ url($value) }}" data-terminal-input="{{ $value }}">Execute</a>
</div>
