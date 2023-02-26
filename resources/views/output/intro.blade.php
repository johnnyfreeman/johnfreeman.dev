@inject('my', 'App\Myself')
<x-output input="intro" cache>
    @auth
        <h1 class="text-xl">👋 <strong>Welcome back</strong><span class="text-red-400">,</span> {{ $my->nickname }}<span class="text-red-400">!</span></h1>
        
        <p class="mt-3 text-lg max-w-md">
            Made anything awesome lately<span class="text-red-400">?</span>
        </p>
    @else
        <h1 class="text-xl">👋 What<span class="text-red-400">'</span>s up<span class="text-red-400">!</span> <strong>I<span class="text-red-400">'</span>m {{ $my->nickname }}</strong><span class="text-red-400">.</span></h1>

        <p class="mt-3 text-lg max-w-md">
            I build things<span class="text-red-400">.</span> And I write about system design at <a href="https://www.eloquentarchitecture.com" target="_blank" class="text-gray-200 underline hover:text-white">eloquentarchitecture.com</a><span class="text-red-400">.</span>
        </p>
    @endauth
</x-output>