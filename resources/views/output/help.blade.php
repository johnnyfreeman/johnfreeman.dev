<div data-controller="output" data-target="terminal.output">
    @include('common.input', ['input' => 'help'])

    <p class="w-full max-w-3xl">My website is built like a command<span class="text-red-400">-</span>line application<span class="text-red-400">.</span> Here are a list of commands you can execute<span class="text-red-400">.</span> For your convenience<span class="text-red-400">,</span> you can also click around too<span class="text-red-400">.</span></p>

    <h2 class="mt-8 text-yellow-400 light:text-yellow-600">Commands</h2>

    <table class="mt-2">
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('about') }}" data-action="click->terminal#execute" data-terminal-input="about">about</a></th>
            <td class="pl-4">A little about myself</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('blog') }}" data-action="click->terminal#execute" data-terminal-input="blog">blog</a></th>
            <td class="pl-4">Articles I've written</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('built-with') }}" data-action="click->terminal#execute" data-terminal-input="built-with">built-with</a></th>
            <td class="pl-4">Libraries and APIs used in building this</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="javascript:void(0)" data-action="click->terminal#execute" data-terminal-input="clear">clear</a></th>
            <td class="pl-4">Clear all output</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('contact') }}" data-action="click->terminal#execute" data-terminal-input="contact">contact</a></th>
            <td class="pl-4">Get in touch with me</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('features') }}" data-action="click->terminal#execute" data-terminal-input="features">features</a></th>
            <td class="pl-4">List of features</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('help') }}" data-action="click->terminal#execute" data-terminal-input="help">help</a></th>
            <td class="pl-4">You're looking at it</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('intro') }}" data-action="click->terminal#execute" data-terminal-input="intro">intro</a></th>
            <td class="pl-4">Let me introduce myself</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('menu') }}" data-action="click->terminal#execute" data-terminal-input="menu">menu</a></th>
            <td class="pl-4">Website menu</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('open-source') }}" data-action="click->terminal#execute" data-terminal-input="open-source">open-source</a></th>
            <td class="pl-4">My open-source projects</td>
        </tr>
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('social') }}" data-action="click->terminal#execute" data-terminal-input="social">social</a></th>
            <td class="pl-4">Social links</td>
        </tr>
    </table>

    <h2 class="mt-8 text-yellow-400 light:text-yellow-600">Options</h2>

    <table class="mt-2">
        <tr>
            <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-200 light:text-teal-600" href="{{ url('social') }}" data-action="click->terminal#execute" data-terminal-input="social">--fresh</a></th>
            <td class="pl-4">Ignore cached output and get fresh output</td>
        </tr>
    </table>

    <h2 class="mt-8 text-yellow-400 light:text-yellow-600">Usage</h2>

    <blockquote class="mt-2 text-indigo-400 light:text-indigo-600">command [options]</blockquote>
</div>
