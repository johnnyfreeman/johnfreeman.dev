<x-output input="blog" cache>
    <p class="">Here are a few of my latest articles<span class="text-marcelin">.</span></p>

    @foreach($posts as $post)
        <div class="mt-6 group relative w-full max-w-xl">
            <ul class="absolute left-full top-2 space-y-1">
                <li>
                    <a href="{{ route('blog.edit', $post)}}" title="Edit link" class="flex items-center justify-center h-10 w-10 bg-nosferatu-700 text-nosferatu-100 hover:bg-cyan-500 hover:text-white" data-turbo-stream>
                        <x-icons.pencil class="w-4 h-4" />
                    </a>
                </li>
                <li>
                    <form action="{{ route('blog.unlink', $post) }}" method="DELETE">
                        @csrf

                        <button type="submit" data-form-target="submit" title="Unlink" class="flex items-center justify-center h-10 w-10 bg-nosferatu-700 text-nosferatu-100 hover:bg-rose-500 hover:text-white">
                            <x-icons.link-slash class="w-4 h-4" />
                        </button>
                    </form>
                </li>
            </ul>

            <div class="bg-white text-nosferatu-600 shadow p-6 space-y-3">
                <img src="{{ $post->image }}" class="w-full object-fill" />
                <div>
                    <div class="flex items-center justify-between">
                        <a href="{{ $post->url }}?ref=johnfreeman.dev" target="_blank" class="group flex items-center space-x-2">
                            <span class="text-dracula-500 underline font-bold">{{ $post->title }}</span>
                            <x-icons.arrow-up-right-from-square class="inline-block text-nosferatu-400 fill-current w-3 h-3" />
                        </a>
                    </div>
                    <p class="text-nosferatu-400 text-xs">Published {{ $post->published_at?->longRelativeDiffForHumans() }} on {{ $post->site }}</p>
                </div>
                <p class="text-nosferatu-700">{{ $post->excerpt }}</p>
                <ul class="text-xs w-full list-none flex flex-wrap items-center text-nosferatu-500">
                    @foreach($post->tags as $tag)
                        <li class="inline-flex items-center mr-2 mb-2">
                            <span class="inline-flex items-center h-7 px-2 bg-nosferatu-50/30">{{ $tag }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

    <p class="mt-6">Read more over at <a href="https://www.eloquentarchitecture.com" target="_blank" class="text-dracula underline">Eloquent Architecture</a><span class="text-marcelin">.</span></p>
</x-output>

<x-input-form />