<div data-target="terminal.output">
    @include('common.input', ['input' => 'about'])

    <div class="flex w-full max-w-sm bg-white text-gray-600 rounded-lg shadow p-6 font-sans">
        <div class="flex-shrink-0">
            <img class="rounded-full w-24 h-24" src="{{ asset('img/me.jpg') }}" alt="Picture of me">
        </div>
        <div class="ml-6">
            <div class="text-indigo-600 font-bold">John Freeman</div>
            <p class="text-gray-700">I build things.</p>

            <ul class="flex flex-wrap font-sans text-xs">
                <li class="inline mt-2 mr-2"><a class="inline-block uppercase tracking-wide bg-blue-400 light:bg-blue-600 rounded text-white hover:bg-blue-500 light:hover:bg-blue-700 px-3 py-1" href="{{ url('contact') }}" data-action="click->terminal#execute" data-terminal-input="contact">Get in touch</a></li>
            </ul>
        </div>
    </div>

    <p class="mt-8 w-full max-w-3xl">My name is John<span class="text-red-400">,</span> I<span class="text-red-400">'</span>m 34<span class="text-red-400">,</span> and I’ve been building on the web since I was 14<span class="text-red-400">.</span> Like many others<span class="text-red-400">,</span> I started out with Microsoft Frontpage and a boy<span class="text-red-400">'</span>s dream of making a web page with links to all my favorite Quake 2 skins<span class="text-red-400">.</span> Naturally<span class="text-red-400">,</span> I had so much fun doing it that it remained a side hobby for about a decade<span class="text-red-400">.</span> During that time I continued learning more about my new craft from articles<span class="text-red-400">,</span> books<span class="text-red-400">,</span> youtube<span class="text-red-400">,</span> podcasts<span class="text-red-400">,</span> and whatever else I could get my hands on<span class="text-red-400">.</span></p>

    {{-- <p class="mt-8 w-full max-w-3xl">Around 2009<span class="text-red-400">,</span> I got my first job as a “real” designer/developer<span class="text-red-400">.</span> Since then<span class="text-red-400">,</span> I<span class="text-red-400">'</span>ve worked my way from making simple brochure-style websites with basic HTML/CSS sprinkled with a little bit of jQuery and PHP<span class="text-red-400">,</span> to small applications with Codeigniter and jQuery/Mootools<span class="text-red-400">,</span> to bigger applications with Laravel and React/Vue<span class="text-red-400">.</span></p> --}}

    <p class="mt-8 w-full max-w-3xl">Today<span class="text-red-400">,</span> I am part of a small remote software company in the healthcare space<span class="text-red-400">.</span> There I envision<span class="text-red-400">,</span> present<span class="text-red-400">,</span> plan<span class="text-red-400">,</span> design<span class="text-red-400">,</span> and then build about half of the pieces of our product<span class="text-red-400">.</span> We build/sell a <span class="text-red-400">"</span>patient experience platform<span class="text-red-400">",</span> which is really just marketing<span class="text-red-400">-</span>speak for surveys<span class="text-red-400">.</span> There<span class="text-red-400">'</span>s more to it than that of course with EMR integration<span class="text-red-400">,</span> heathcare compliance<span class="text-red-400">,</span> incident management<span class="text-red-400">,</span> etc<span class="text-red-400">.</span> But you get the idea<span class="text-red-400">.</span></p>

    <p class="mt-8 w-full max-w-3xl">In my off<span class="text-red-400">-</span>hours<span class="text-red-400">,</span> I travel full<span class="text-red-400">-</span>time with my family of 5 in our RV<span class="text-red-400">.</span> We<span class="text-red-400">'</span>ve spent the last year and a half exploring and learning about our beautiful nation<span class="text-red-400">.</span> If you<span class="text-red-400">'</span>d like to keep up with our journey<span class="text-red-400">,</span> check out our <a class="text-blue-400 hover:text-blue-500" href="https://www.instagram.com/freemansboldlygo" target="_blank">Instagram</a><span class="text-red-400">.</span></p>
</div>
