@include('input', ['input' => 'contact'])

<p class="">You can say hey to me on <a class="bg-gray-900 text-teal-400 p-1" href="{{ url('social') }}" data-action="click->terminal#execute" data-terminal-input="social">social</a><span class="text-red-400">,</span> or send me an email below<span class="text-red-400">.</span></p>

<form class="mt-3 w-full max-w-2xl font-sans bg-white rounded-lg shadow p-6">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Your Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane Doe">
            <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Your Email Address
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="jane.doe@gmail.com">
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Your Message
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
            <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
            <button type="submit" class="uppercase tracking-wide bg-blue-400 rounded text-white text-xs hover:bg-blue-500 px-3 py-2">Send</button>
        </div>
    </div>
</form>
