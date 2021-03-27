<div data-controller="output" data-target="terminal.output">
    @include('common.input', ['input' => 'built-with'])

    <p class="mt-2 w-full max-w-3xl">The basic idea here is simple; there is an output container, and an input form. When the input form is submitted, an ajax call is made to the server. The server returns an html partial, which is then appended to the output container. Easy peasy.</p>

    <p class="mt-8 w-full max-w-3xl">The specific libraries and apis used are not that important. Most of them could easily be swapped out with something else that serves the same purpose, or even without a library at all in most cases.</p>

    <h2 class="mt-8 text-yellow-400 light:text-yellow-600">Uses</h2>

    <ul class="mt-2 list-inside list-disc">
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://laravel.com">Laravel</a> for serving html pages/partials and to handle contact form submission</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://tailwindcss.com/">Tailwind</a> for css styling</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://stimulusjs.org">Stimulus</a> for organizing front-end logic</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://github.com/axios/axios">Axios</a> for sending input to server via ajax and returning the response</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://developer.mozilla.org/en-US/docs/Web/API/NavigatorOnLine/onLine">navigator.onLine</a> api displaying online/offline status in the footer</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons/WebExtensions/Interact_with_the_clipboard">document.execCommand('copy')</a> for copying text to your clipboard</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://github.com/substack/minimist">Minimist</a> to parse command line input into an object</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-color-scheme">prefers-color-scheme</a> to override styling when user has requested the system use a light or dark color scheme</li>
        <li><a class="bg-gray-900 text-teal-400 p-1 light:bg-gray-100 light:text-teal-600" href="https://developer.mozilla.org/en-US/docs/Web/API/Navigator/vibrate">navigator.vibrate</a> to initiate a slight vibration when the server responds with a status code of 400 or above</li>
    </ul>
</div>
