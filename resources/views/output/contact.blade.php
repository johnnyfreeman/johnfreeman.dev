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
                <x-form.label>Your Name</x-form.label>

                <x-form.input data-controller="autofocus" name="name" type="text" placeholder="Jane Doe" value="{{ old('name') }}" />

                @error('name')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-form.label>Your Email Address</x-form.label>

                <x-form.input name="email" type="text" placeholder="jane.doe@gmail.com" value="{{ old('email') }}" />

                @error('email')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <x-form.label>Your Message</x-form.label>

                <x-form.textarea name="message">{{ old('message') }}</x-form.textarea>
                <p class="mt-2 text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>

                @error('message')
                    <x-form.error>{{ $message }}</x-form.error>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3 flex justify-between space-x-4 items-center">
                <a data-turbo-stream class="inline-block tracking-wide text-blue-600 text-xs" href="{{ url('blank') }}">Nevermind</a>
                
                <x-form.button type="submit">Send Message</x-form.button>
            </div>
        </div>
    </form>
</x-output>

<div id="input-form"></div>