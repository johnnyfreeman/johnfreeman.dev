<div data-controller="contact">
    @include('common.input', ['input' => 'contact'])

    <p class="">You can say hey to me on <a class="bg-gray-900 light:bg-gray-200 text-teal-400 light:text-teal-600 p-1" href="{{ url('social') }}" data-action="click->terminal#execute" data-terminal-input="social">social</a><span class="text-red-400">,</span> or shoot me an email<span class="text-red-400">.</span></p>

    <form action="" class="mt-3 w-full max-w-2xl font-sans bg-white rounded-lg shadow p-6" data-action="submit->contact#submit" data-target="contact.form" method="POST">
        @csrf

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Your Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-400 light:focus:border-blue-600" name="name" type="text" placeholder="Jane Doe" value="{{ old('name') }}">

                @error('name')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Your Email Address
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-400 light:focus:border-blue-600" name="email" type="text" placeholder="jane.doe@gmail.com" value="{{ old('email') }}">

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
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-400 light:focus:border-blue-600" name="message">{{ old('message') }}</textarea>
                <p class="mt-3 text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>

                @error('message')
                <p class="mt-3 text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <button type="submit" class="uppercase tracking-wide bg-blue-400 light:bg-blue-600 rounded text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-3 py-2" data-target="contact.submit">Send</button>
            </div>
        </div>
    </form>
</div>
