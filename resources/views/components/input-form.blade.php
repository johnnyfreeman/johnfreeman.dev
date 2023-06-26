@props([])
<form data-action="turbo:submit-end->terminal#scrollToLastOutput" id="input-form" action="{{ route('execute') }}" class="mt-8 h-12 flex items-center -mx-5 md:-mx-10 px-5 md:px-10" method="POST" defaultbutton="execute">
    @csrf
    
    <x-prompt />

    <input data-controller="autofocus" data-action="keydown@document->terminal#listenToKeys" autocomplete="off" class="bg-transparent w-full px-2 focus:outline-none placeholder-nosferatu-700 focus:placeholder-nosferatu-600" data-terminal-target="inputField" name="input" type="text" placeholder="Type `help` for more information">

    <a class="hidden md:inline-block cursor-pointer uppercase tracking-wide border border-dracula-600 rounded text-indigo-200 text-xs px-3 py-1 mr-2 hover:text-white light:border-nosferatu-200 light:text-nosferatu-500 light:hover:text-nosferatu-700" data-action="click->terminal#focus" href="javascript:void(0)" title="Press `/` to focus">/</a>

    <button class="hidden md:inline-block uppercase tracking-wide bg-dracula-600 border border-dracula-600 rounded text-white text-xs px-3 py-1 hover:bg-blue-500 hover:border-blue-500 light:bg-nosferatu-200 light:text-nosferatu-600 light:border-nosferatu-200 light:hover:bg-nosferatu-300 light:hover:border-nosferatu-300" id="execute" type="submit">Execute</button>
</form>