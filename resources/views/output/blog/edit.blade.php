<x-output input="blog {{ $post->getKey() }}" cache>
    <form action="{{ route('blog.update', $post) }}" class="mt-3 w-full max-w-2xl bg-nosferatu-100 focus-within:bg-white shadow p-6" method="POST">
        @csrf
        @honeypot

        <div class="flex space-x-4 mb-6">
            <div class="shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-dracula-500 to-indigo-500">
                <x-icons.rss class="w-6 h-6 text-white light:text-blue-600" />
            </div>

            <div>
                <h1 class="text-2xl font-bold mb-2 text-nosferatu-800">Edit article link!</h1>
                <p class="text-nosferatu-600 text-sm leading-relaxed">
                    Paste the URL of an article you'd like to link to. We'll grab the title, excerpt, and image for you.
                </p>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Site
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" data-controller="autofocus" name="site" type="text" placeholder="My Blog Post" value="{{ old('site', $post->site) }}">

                @error('site')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-3/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Title
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="title" type="text" placeholder="My Blog Post" value="{{ old('title', $post->title) }}">

                @error('title')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Excerpt
                </label>

                <textarea class="appearance-none block w-full h-32 bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                <p class="mt-3 text-nosferatu-600 text-xs italic">No more than a few sentences.</p>

                @error('excerpt')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Url
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="url" type="text" placeholder="https://www.eloquentarchitecture.com/my-blog-post" value="{{ old('url', $post->url) }}">

                @error('url')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Image
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="image" type="text" value="{{ old('image', $post->image) }}">

                @error('url')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Published
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="published_at" type="datetime-local" placeholder="Jane Doe" value="{{ old('published_at', $post->published_at) }}">

                @error('published_at')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-nosferatu-700 text-xs font-bold mb-2">
                    Tags
                </label>

                <input class="appearance-none block w-full bg-nosferatu-100 shadow-inner text-nosferatu-700 border border-nosferatu-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="tags" type="text" value="{{ old('tags', implode(',', $post->tags)) }}" />

                @error('tags')
                    <p class="mt-3 text-marcelin-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 flex justify-between space-x-4 items-center">
                <a data-turbo-stream class="inline-block tracking-wide text-blue-600 text-xs" href="{{ url('blank') }}">Nevermind</a>
                
                <x-form.button type="submit">Save Article Link</x-form.button>
            </div>
        </div>
    </form>
</x-output>

<div id="input-form"></div>