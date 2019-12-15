<p class="group mt-8 text-indigo-400 light:text-indigo-600 h-8" data-controller="clipboard">
    <span class="font-bold text-yellow-400 light:text-yellow-600 mr-1">$</span>
    <span class="mr-1" data-target="terminal.input"><input data-target="clipboard.copyable" class="appearance-none border-0 bg-transparent" readonly type="text" value="{{ $input }}" /></span>
    <a class="hidden group-hover:inline-block cursor-pointer uppercase tracking-wide border border-indigo-800 rounded text-indigo-200 text-xs px-3 py-1 mr-1 hover:text-white light:border-gray-200 light:text-gray-500 light:hover:text-gray-700" href="javascript:void(0)" data-action="click->clipboard#copy">Copy</a>
    <a class="hidden group-hover:inline-block cursor-pointer uppercase tracking-wide border border-indigo-800 rounded text-indigo-200 text-xs px-3 py-1 mr-1 hover:text-white light:border-gray-200 light:text-gray-500 light:hover:text-gray-700" href="javascript:void(0)" data-action="click->terminal#execute" data-terminal-input="{{ $input }}">Execute</a>
</p>
