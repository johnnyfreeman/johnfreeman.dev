<div data-controller="output" data-terminal-target="output">
    @include('common.input', ['input' => 'menu'])

    <ul class="flex flex-wrap font-sans">
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('about') }}" data-action="click->terminal#execute" data-terminal-input="about">about</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('blog') }}" data-action="click->terminal#execute" data-terminal-input="blog">blog</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('open-source') }}" data-action="click->terminal#execute" data-terminal-input="open-source">Open Source</a></li>
        <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white hover:bg-blue-600 light:hover:bg-blue-700 px-3 py-1" href="{{ url('contact') }}" data-action="click->terminal#execute" data-terminal-input="contact">contact</a></li>
    </ul>
</div>
