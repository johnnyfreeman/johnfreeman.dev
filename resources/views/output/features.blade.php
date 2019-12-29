<div data-controller="output" data-target="terminal.output">
    @include('common.input', ['input' => 'features'])

    <ul class="mt-2 list-inside list-disc">
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm">/</kbd> shortcut to focus main input, only if body has focus</li>
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm">up</kbd>/<kbd class="bg-indigo-800 p-1 rounded text-sm">down</kbd> arrow shortcuts for scrolling history, only if body or main input field has focus</li>
        <li><kbd class="bg-indigo-800 p-1 rounded text-sm">enter</kbd> shortcut for executing what's in the input field, only if body or main input field has focus</li>
        <li>All output is cached so that subsequent executions don't have to make a round trip to the server. Add the <code class="bg-indigo-800 p-1 rounded text-sm">--fresh</code> option to a command to ignore the cache</li>
        <li>Exceptions thrown from the server return a html partial with the error message and is appended to the output container</li>
        <li>Online/offline status indicator in the footer</li>
        <li>Links to commands will be executed the same as if you were to run them manually. For example, the hamburger icon in the header runs the <code class="bg-indigo-800 p-1 rounded text-sm">menu</code> command.</li>
        <li>The contact form returns appends submission response to the output container for success message or validation errors.</li>
    </ul>
</div>
