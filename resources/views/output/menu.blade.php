<x-output input="menu" cache>
    <ul class="flex flex-wrap font-sans">
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('about') }}" data-turbo-stream data-terminal-input="about">about</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('blog') }}" data-turbo-stream data-terminal-input="blog">blog</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('open-source') }}" data-turbo-stream data-terminal-input="open-source">Open Source</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('contact') }}" data-turbo-stream data-terminal-input="contact">contact</a></li>
    </ul>
</x-output>
