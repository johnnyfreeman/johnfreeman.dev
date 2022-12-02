@inject('my', 'App\Myself')
<x-output input="intro" cache>
    @auth
    <p class="text-xl">
        👋 <strong>Welcome back</strong><span class="text-red-400">,</span> {{ $my->nickname }}<span class="text-red-400">!</span><br>made anything awesome lately<span class="text-red-400">?</span>
    </p>
    @else
    <p class="text-xl">
        👋 What<span class="text-red-400">'</span>s up<span class="text-red-400">!</span> <strong>I<span class="text-red-400">'</span>m {{ $my->nickname }}</strong><span class="text-red-400">.</span><br>I build things<span class="text-red-400">.</span> And I write about<br>system design at <a href="https://www.eloquentarchitecture.com" target="_blank" class="text-gray-200 underline hover:text-white">eloquentarchitecture.com</a><span class="text-red-400">.</span>
    </p>
    @endauth
</x-output>