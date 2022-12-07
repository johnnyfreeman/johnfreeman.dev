<x-output input="blog create" cache>
    <form action="{{ route('blog.store') }}" class="mt-3 w-full max-w-2xl font-sans bg-gray-300 focus-within:bg-white rounded-lg shadow p-6" method="POST">
        @csrf
        @honeypot

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-3/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Title
                </label>
                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" data-controller="autofocus" name="title" type="text" placeholder="My Blog Post" value="{{ old('title') }}">

                @error('title')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Excerpt
                </label>
                <textarea class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="excerpt">{{ old('excerpt') }}</textarea>
                <p class="mt-3 text-gray-600 text-xs italic">No more than a few sentences.</p>

                @error('excerpt')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Url
                </label>
                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="url" type="text" placeholder="https://www.eloquentarchitecture.com/my-blog-post" value="{{ old('url') }}">

                @error('url')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Published At
                </label>
                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="published_at" type="datetime-local" placeholder="Jane Doe" value="{{ old('published_at') }}">

                @error('published_at')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <button type="submit" class="uppercase tracking-wide bg-blue-500 light:bg-blue-600 rounded text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-3 py-2" data-form-target="submit">Create</button>
            </div>
        </div>
    </form>
</x-output>
