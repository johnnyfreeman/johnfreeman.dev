<x-output input="blog create" cache>
    <form action="{{ route('blog.store') }}" class="mt-3 w-full max-w-2xl bg-gray-100 focus-within:bg-white shadow p-6" method="POST">
        @csrf
        @honeypot

        <div class="flex space-x-4 mb-6">
            <div class="shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500">
                <x-icons.rss class="w-6 h-6 text-white light:text-blue-600" />
            </div>

            <div>
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Link to an article!</h1>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Paste the URL of an article you'd like to link to. We'll grab the title, excerpt, and image for you.
                </p>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Url
                </label>

                <input data-controller="autofocus" class="appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="url" type="text" placeholder="https://www.eloquentarchitecture.com/my-post" value="{{ old('url') }}">

                @error('url')
                    <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 flex justify-between space-x-4 items-center">
                <a data-turbo-stream class="inline-block tracking-wide text-blue-600 text-xs" href="{{ url('blank') }}">Nevermind</a>
                
                <x-form.button type="submit">Link Article</x-form.button>
            </div>
        </div>
    </form>
</x-output>

<div id="input-form"></div>