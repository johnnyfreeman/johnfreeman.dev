@include('input', ['input' => 'menu'])

<ul class="font-sans mt-2">
    <li class="inline"><a class="uppercase tracking-wide bg-blue-400 rounded text-white hover:bg-blue-500 px-3 py-2" href="{{ url('about') }}" data-action="click->terminal#execute" data-terminal-input="about">about</a></li>
    <li class="inline"><a class="uppercase tracking-wide bg-blue-400 rounded text-white hover:bg-blue-500 px-3 py-2" href="{{ url('blog') }}" data-action="click->terminal#execute" data-terminal-input="blog">blog</a></li>
    <li class="inline"><a class="uppercase tracking-wide bg-blue-400 rounded text-white hover:bg-blue-500 px-3 py-2" href="{{ url('projects') }}" data-action="click->terminal#execute" data-terminal-input="projects">projects</a></li>
    <li class="inline"><a class="uppercase tracking-wide bg-blue-400 rounded text-white hover:bg-blue-500 px-3 py-2" href="{{ url('contact') }}" data-action="click->terminal#execute" data-terminal-input="contact">contact</a></li>
</ul>
