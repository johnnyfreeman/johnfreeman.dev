<x-output input="features" cache>
    <h2 class="mt-2 text-yellow-400">Usability</h2>

    <ul class="mt-2 list-inside list-disc">
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">/</kbd> shortcut to focus main input, only if body has focus</li>
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">up</kbd>/<kbd class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">down</kbd> arrow shortcuts for scrolling history, only if body or main input field has focus</li>
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">enter</kbd> shortcut for executing what's in the input field, only if body or main input field has focus</li>
        <li>Exceptions thrown from the server return a html partial with the error message and is appended to the output container</li>
        <li>Online/offline status indicator in the footer</li>
        <li>Links to commands will be executed the same as if you were to run them manually. For example, the hamburger icon in the header runs the <code class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">menu</code> command.</li>
        <li>The contact form appends the submission response to the output container.</li>
        <li>Styling changes based on the user's system preference of light or dark color theme.</li>
        <li>There is a slight vibration (on supported devices) for server errors.</li>
        <li>When hovering over a previous command output, there are options to allow you to replay the command or copy to clipboard.</li>
        <li>Every command also has it's own linkable page. For example, you can run <code class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">about</code> or navigate to <a class="text-blue-400 hover:text-blue-500 light:text-blue-600 light:hover:text-blue-700" href="{{ url('about') }}">/about</a>.</li>
    </ul>

    <h2 class="mt-8 text-yellow-400">Performance</h2>

    <ul class="mt-2 list-inside list-disc">
        <li>All output is cached so that subsequent executions don't have to make a round trip to the server. Add the <code class="bg-indigo-800 p-1 rounded text-sm light:bg-indigo-100">--fresh</code> option to a command to ignore the cache</li>
    </ul>
</x-output>

<x-input-form />