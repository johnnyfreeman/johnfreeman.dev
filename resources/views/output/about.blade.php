@inject('my', 'App\Myself')

<x-output input="about" cache>
    <div class="flex w-full max-w-xl bg-white text-gray-600 shadow p-6 font-sans">
        <div class="flex space-x-4">
            <img class="shrink-0 rounded-full w-12 h-12" src="{{ asset('img/me.jpg') }}" alt="Picture of me">

            <div>
                <h1 class="text-2xl font-bold mb-2 text-gray-800">{{ $my->name }}</h1>

                <p class="text-gray-600 text-sm leading-relaxed">
                    I build things and enjoy solving problems.
                </p>

                <ul class="flex flex-wrap font-sans text-xs">
                    <li class="inline-block mt-6 mr-2"><a data-turbo-stream class="font-semibold uppercase tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 shadow border border-purple-500 light:bg-blue-600 text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-4 py-3" href="{{ url('contact') }}" data-terminal-input="contact">Get in touch</a></li>
                </ul>
            </div>
        </div>
    </div>
    {{-- My name is {{ $my->nickname }}<span class="text-red-400">,</span> I<span class="text-red-400">'</span>m {{ $my->age()->diffInYears() }}<span class="text-red-400">,</span> and I<span class="text-red-400">'</span>ve been building on the web since I was 14<span class="text-red-400">.</span> --}}

    <p class="mt-8 w-full max-w-3xl">It all started {{ $my->codingPassion()->diffForHumans() }} with Microsoft Frontpage and a boy<span class="text-red-400">'</span>s dream. All I wanted to do was make <em>something</em> with links to all my favorite Quake 2 skins<span class="text-red-400">.</span> Naturally<span class="text-red-400">,</span> I had so much fun doing it that it remained a consistant hobby for the next 10 years<span class="text-red-400">.</span> During which I soaked up anything I could get my hands on about my new craft from articles<span class="text-red-400">,</span> books<span class="text-red-400">,</span> then later youtube<span class="text-red-400">,</span> podcasts<span class="text-red-400">,</span> etc.<span class="text-red-400">.</span></p>

    {{-- <p class="mt-8 w-full max-w-3xl">Around 2009<span class="text-red-400">,</span> I got my first job as a “real” designer/developer<span class="text-red-400">.</span> Since then<span class="text-red-400">,</span> I<span class="text-red-400">'</span>ve worked my way from making simple brochure-style websites with basic HTML/CSS sprinkled with a little bit of jQuery and PHP<span class="text-red-400">,</span> to small applications with Codeigniter and jQuery/Mootools<span class="text-red-400">,</span> to bigger applications with Laravel and React/Vue<span class="text-red-400">.</span></p> --}}

    <p class="mt-8 w-full max-w-3xl">Today<span class="text-red-400">,</span> I lead a small team of engineers at a small remote software company in the healthcare space<span class="text-red-400">.</span> There I've played a major role in envisioning<span class="text-red-400">,</span> planning<span class="text-red-400">,</span> designing<span class="text-red-400">,</span> and the execution of about half of our user-facing assets<span class="text-red-400">.</span> We sell a <span class="text-red-400">"</span>patient experience platform<span class="text-red-400">".</span> This, among other things, involves surveys, EMR integration<span class="text-red-400">,</span> heathcare compliance<span class="text-red-400">,</span> incident and task management<span class="text-red-400">,</span> etc<span class="text-red-400">.</span></p>

    <p class="mt-8 w-full max-w-3xl">In my off<span class="text-red-400">-</span>hours<span class="text-red-400">,</span> <a class="text-blue-400 hover:text-blue-500 light:text-blue-600 light:hover:text-blue-700" href="https://www.instagram.com/freemansboldlygo" target="_blank">I travel full<span class="text-red-400">-</span>time with my family of 5 in our RV</a><span class="text-red-400">.</span> We<span class="text-red-400">'</span>ve spent {{ $my->rvLife()->diffInYears() }} years exploring and learning about our beautiful nation<span class="text-red-400">.</span></p>
</x-output>

<x-input-form />