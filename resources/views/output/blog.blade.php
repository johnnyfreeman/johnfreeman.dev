<x-output input="blog" cache>
    <p class="">Here are a few of my latest articles<span class="text-red-400">.</span></p>

    @foreach($posts as $post)
    <div class="mt-6 w-full max-w-xl bg-white text-gray-600 rounded-lg shadow p-6 font-sans space-y-3">
        <div class="flex items-center justify-between">
            <a href="{{ $post['url'] }}" target="_blank" class="group flex items-center space-x-2">
                <x-icons.rss class="inline-block fill-current w-4 h-4" />
                <span class="text-indigo-600 group-hover:text-indigo-700 font-bold">{{ $post['title'] }}</span>
                <x-icons.arrow-up-right-from-square class="inline-block text-gray-400 fill-current w-3 h-3" />
            </a>

            <span class="bg-gray-100 text-gray-800 p-1 rounded text-xs">
                {{ (new Carbon\Carbon($post['published_at']))->shortAbsoluteDiffForHumans() }}
            </span>
        </div>

        <p class="text-gray-700">{{ $post['excerpt'] }}</p>

        <ul class="w-full list-none flex flex-wrap items-center space-x-4">
            @foreach($post['tags'] as $tag)
            <li class="inline-flex items-center">
                <span class="inline-block rounded-full h-3 w-3 mr-2" style="background-color:{{ $tag['accent_color'] }};"></span>
                <a class="hover:underline" href="{{ $tag['url'] }}">{{ $tag['name'] }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</x-output>
