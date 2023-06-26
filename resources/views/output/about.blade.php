@inject('my', 'App\Myself')

<x-output input="about" cache>
    <div class="flex w-full max-w-xl bg-white text-nosferatu-600 shadow p-6">
        <div class="flex space-x-4">
            <img class="shrink-0 rounded-full w-12 h-12" src="{{ asset('img/me.jpg') }}" alt="Picture of me">

            <div>
                <h1 class="text-2xl font-bold mb-2 text-nosferatu-800">{{ $my->name }}</h1>

                <p class="text-nosferatu-600 text-sm leading-relaxed">
                    I build things and enjoy solving problems.
                </p>

                <ul class="flex flex-wrap text-xs">
                    <li class="inline-block mt-6 mr-2">
                        <x-form.button data-turbo-stream href="{{ url('contact') }}">Get in touch</x-form.button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- My name is {{ $my->nickname }}<span class="text-marcelin">,</span> I<span class="text-marcelin">'</span>m {{ $my->age()->diffInYears() }}<span class="text-marcelin">,</span> and I<span class="text-marcelin">'</span>ve been building on the web since I was 14<span class="text-marcelin">.</span> --}}

    <p class="mt-8 w-full max-w-3xl">It all started {{ $my->codingPassion()->diffForHumans() }} with Microsoft Frontpage and a boy<span class="text-marcelin">'</span>s dream. All I wanted to do was make <em>something</em> with links to all my favorite Quake 2 skins<span class="text-marcelin">.</span> Naturally<span class="text-marcelin">,</span> I had so much fun doing it that it remained a consistant hobby for the next 10 years<span class="text-marcelin">.</span> During which I soaked up anything I could get my hands on about my new craft from articles<span class="text-marcelin">,</span> books<span class="text-marcelin">,</span> then later youtube<span class="text-marcelin">,</span> podcasts<span class="text-marcelin">,</span> etc.<span class="text-marcelin">.</span></p>

    {{-- <p class="mt-8 w-full max-w-3xl">Around 2009<span class="text-marcelin">,</span> I got my first job as a “real” designer/developer<span class="text-marcelin">.</span> Since then<span class="text-marcelin">,</span> I<span class="text-marcelin">'</span>ve worked my way from making simple brochure-style websites with basic HTML/CSS sprinkled with a little bit of jQuery and PHP<span class="text-marcelin">,</span> to small applications with Codeigniter and jQuery/Mootools<span class="text-marcelin">,</span> to bigger applications with Laravel and React/Vue<span class="text-marcelin">.</span></p> --}}

    <p class="mt-8 w-full max-w-3xl">Today<span class="text-marcelin">,</span> I lead a small team of engineers at a small remote software company in the healthcare space<span class="text-marcelin">.</span> There I've played a major role in envisioning<span class="text-marcelin">,</span> planning<span class="text-marcelin">,</span> designing<span class="text-marcelin">,</span> and the execution of about half of our user-facing assets<span class="text-marcelin">.</span> We sell a <span class="text-marcelin">"</span>patient experience platform<span class="text-marcelin">".</span> This, among other things, involves surveys, EMR integration<span class="text-marcelin">,</span> heathcare compliance<span class="text-marcelin">,</span> incident and task management<span class="text-marcelin">,</span> etc<span class="text-marcelin">.</span></p>

    <p class="mt-8 w-full max-w-3xl">In my off<span class="text-marcelin">-</span>hours<span class="text-marcelin">,</span> <a class="text-dracula underline" href="https://www.instagram.com/freemansboldlygo" target="_blank">I travel full<span class="text-marcelin">-</span>time with my family of 5 in our RV</a><span class="text-marcelin">.</span> We<span class="text-marcelin">'</span>ve spent {{ $my->rvLife()->diffInYears() }} years exploring and learning about our beautiful nation<span class="text-marcelin">.</span></p>
</x-output>

<x-input-form />