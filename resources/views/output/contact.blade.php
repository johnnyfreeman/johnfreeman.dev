<x-output input="contact" cache>
    <p class="">You can say hey to me on <a data-turbo-stream class="bg-gray-900 light:bg-gray-100 text-teal-400 light:text-teal-600 p-1" href="{{ url('social') }}" data-terminal-input="social">social</a><span class="text-red-400">,</span> or shoot me an email<span class="text-red-400">.</span></p>

    <form action="{{ route('contact') }}" class="mt-3 w-full max-w-2xl font-sans bg-gray-100 focus-within:bg-white shadow p-6" method="POST">
        @csrf
        @honeypot

        <div class="flex space-x-4 mb-6">
            <div class="shrink-0 flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500">
                <x-icons.hand-wave class="w-6 h-6 text-white light:text-blue-600" />
            </div>

            <div>
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Say hi!</h1>
                <p class="text-gray-600 text-sm leading-relaxed">
                    I'd love to hear from you. Please fill out the form below and I'll get back to you as soon as I can.
                </p>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Your Name
                </label>
                <input class="appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" data-controller="autofocus" name="name" type="text" placeholder="Jane Doe" value="{{ old('name') }}">

                @error('name')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Your Email Address
                </label>
                <input class="appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="email" type="text" placeholder="jane.doe@gmail.com" value="{{ old('email') }}">

                @error('email')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Your Message
                </label>
                <textarea class="appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600" name="message">{{ old('message') }}</textarea>
                <p class="mt-3 text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>

                @error('message')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <button type="submit" class="font-semibold uppercase tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 shadow border border-purple-500 light:bg-blue-600 text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-4 py-2" data-form-target="submit">Send</button>
            </div>
        </div>
    </form>
</x-output>

<div id="input-form"></div>