<x-output input="blog" cache>
    <p class="">Here are a few of my latest articles<span class="text-red-400">.</span></p>

    @foreach($posts as $post)
    <div class="mt-6 w-full max-w-xl bg-white text-gray-600 rounded-lg shadow p-6 font-sans space-y-3">
        <div class="flex items-center space-x-3">
            <x-icons.rss class="inline-block fill-current w-4 h-4" />
            <a class="text-indigo-600 hover:text-indigo-700 hover:underline font-bold" href="{{ $post['url'] }}">{{ $post['title'] }}</a>
            <span class="bg-gray-100 text-gray-800 p-1 rounded text-xs">
                {{ (new Carbon\Carbon($post['published_at']))->shortAbsoluteDiffForHumans() }}
            </span>
        </div>

        <p class="text-gray-700">{{ $post['excerpt'] }}</p>

        <ul class="w-full list-none flex flex-wrap items-center space-x-4">
            @foreach($post['tags'] as $tag)
            <li class="inline-flex items-center">
                <span class="inline-block rounded-full bg-red-400 light:bg-red-600 h-3 w-3 mr-2"></span>
                <a class="hover:underline" href="{{ $tag['url'] }}">{{ $tag['name'] }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</x-output>
