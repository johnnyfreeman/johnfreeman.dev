<div data-controller="output" data-target="terminal.output">
    @include('common.input', ['input' => 'intro'])

    <p>Hey<span class="text-red-400">,</span> I<span class="text-red-400">'</span>m John<span class="text-red-400">.</span><br>I<span class="text-red-400">'</span>m a details<span class="text-red-400">-</span>oriented<span class="text-red-400">,</span> full<span class="text-red-400">-</span>stack developer<span class="text-red-400">.</span></p>

    {{-- <ul class="mt-8">
        <li class="inline mr-4"><a class="font-sans uppercase tracking-wide bg-blue-400 rounded text-white hover:bg-blue-500 px-3 py-2" href="{{ url('contact') }}" data-action="click->terminal#execute" data-terminal-input="contact">Get in touch</a></li>

        <li class="inline mr-4"><a class="font-sans uppercase tracking-wide text-white hover:underline py-2" href="{{ url('about') }}" data-action="click->terminal#execute" data-terminal-input="about">More about me</a></li>
    </ul> --}}
</div>
