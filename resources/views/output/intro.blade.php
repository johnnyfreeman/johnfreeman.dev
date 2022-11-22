@inject('my', 'App\Myself')
<x-output input="intro" cache>
    @auth
    <p class="text-xl">
        👋 Welcome back<span class="text-red-400">,</span> {{ $my->nickname }}<span class="text-red-400">!</span><br>made anything awesome lately<span class="text-red-400">?</span>
    </p>
    @else
    <p class="text-xl">
        👋 What<span class="text-red-400">'</span>s up<span class="text-red-400">!</span> <strong>I<span class="text-red-400">'</span>m {{ $my->nickname }}</strong><span class="text-red-400">,</span><br>a details<span class="text-red-400">-</span>oriented<span class="text-red-400">,</span> maker of things<span class="text-red-400">.</span>
    </p>
    @endauth
</x-output>