@include('input', ['input' => 'help'])

<p class="">My website is built like a command<span class="text-red-400">-</span>line application<span class="text-red-400">.</span> Here are a list of commands you can execute<span class="text-red-400">.</span> For your convenience<span class="text-red-400">,</span> you can also click around too<span class="text-red-400">.</span> :)</p>

<table class="mt-8">
    {{-- <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('built-with') }}" data-action="click->terminal#execute" data-terminal-input="built-with">built-with</a></th>
        <td class="pl-4">Technologies used building this</td>
    </tr> --}}
    <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('clear') }}" data-action="click->terminal#execute" data-terminal-input="clear">clear</a></th>
        <td class="pl-4">Clear all output</td>
    </tr>
    <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('help') }}" data-action="click->terminal#execute" data-terminal-input="help">help</a></th>
        <td class="pl-4">This</td>
    </tr>
    <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('intro') }}" data-action="click->terminal#execute" data-terminal-input="intro">intro</a></th>
        <td class="pl-4">Let me introduce myself</td>
    </tr>
    <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('menu') }}" data-action="click->terminal#execute" data-terminal-input="menu">menu</a></th>
        <td class="pl-4">Website menu</td>
    </tr>
    <tr>
        <th class="text-left pt-1"><a class="bg-gray-900 text-teal-400 p-1" href="{{ url('social') }}" data-action="click->terminal#execute" data-terminal-input="social">social</a></th>
        <td class="pl-4">Social links</td>
    </tr>
</table>
