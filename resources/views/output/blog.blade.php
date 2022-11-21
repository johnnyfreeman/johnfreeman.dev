<div data-controller="output" data-terminal-target="output">
    @include('common.input', ['input' => 'blog'])

    <p class="">When I can<span class="text-red-400">,</span> I enjoy sharing and collaborating with the community<span class="text-red-400">.</span> Here are a few of my latest articles<span class="text-red-400">.</span></p>

    <div class="mt-6 w-full max-w-xl bg-white text-gray-600 rounded-lg shadow p-6 font-sans">
        <div class="flex items-center space-x-3">
            <x-icons.rss class="inline-block fill-current w-4 h-4" />
            <a class="text-indigo-600 hover:text-indigo-700 hover:underline font-bold" href="https://john-freeman.ghost.io/">Scraping Paginated APIs with Queues</a>
            <span class="bg-gray-100 text-gray-800 p-1 rounded text-xs">Nov 2022</span>
        </div>
        <p class="text-gray-700">Inspired by <a class="text-indigo-600 hover:text-indigo-700 hover:underline" href="https://bannister.me/blog/using-generators-for-pagination">Using Generators for Pagination</a>, this is an alternative look at how you could handle consuming paginated records from an API using Laravel's queues.</p>
        <ul class="w-full list-none mt-3 flex flex-wrap items-center space-x-4">
            <li class="inline-flex items-center">
                <span class="inline-block rounded-full bg-red-400 light:bg-red-600 h-3 w-3 mr-2"></span> <a class="hover:underline" href="https://github.com/laravel/laravel">laravel</a>
            </li>
        </ul>
    </div>
</div>
