@props([])
<form data-action="turbo:submit-end->terminal#scrollToLastOutput" id="input-form" action="{{ route('execute') }}" class="mt-8 h-12 flex items-center -mx-5 md:-mx-10 px-5 md:px-10" method="POST" defaultbutton="execute">
    @csrf
    
    <x-prompt />

    <input data-controller="autofocus" data-action="keydown@document->terminal#listenToKeys" autocomplete="off" class="bg-transparent w-full px-2 focus:outline-none placeholder-gray-700 focus:placeholder-gray-600" data-terminal-target="inputField" name="input" type="text" placeholder="Type `help` for more information">

    <a class="hidden md:inline-block cursor-pointer uppercase tracking-wide border border-indigo-800 rounded text-indigo-200 text-xs px-3 py-1 mr-2 hover:text-white light:border-gray-200 light:text-gray-500 light:hover:text-gray-700" data-action="click->terminal#focus" href="javascript:void(0)" title="Press `/` to focus">/</a>

    <button class="hidden md:inline-block uppercase tracking-wide bg-indigo-800 border border-indigo-800 rounded text-white text-xs px-3 py-1 hover:bg-blue-500 hover:border-blue-500 light:bg-gray-200 light:text-gray-600 light:border-gray-200 light:hover:bg-gray-300 light:hover:border-gray-300" id="execute" type="submit">Execute</button>
</form>