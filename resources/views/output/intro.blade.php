@inject('my', 'App\Myself')
<x-output input="intro" cache>
    @auth
        <h1 class="text-xl">👋 <strong>Welcome back</strong><span class="text-marcelin">,</span> {{ $my->nickname }}<span class="text-marcelin">!</span></h1>
        
        <p class="mt-3 text-lg max-w-md">
            Made anything awesome lately<span class="text-marcelin">?</span>
        </p>
    @else
        <h1 class="text-xl">👋 What<span class="text-marcelin">'</span>s up<span class="text-marcelin">!</span> <strong>I<span class="text-marcelin">'</span>m {{ $my->nickname }}</strong><span class="text-marcelin">.</span></h1>

        <p class="mt-3 text-lg max-w-md">
            I build things<span class="text-marcelin">.</span> And I write about system design at <a href="https://www.eloquentarchitecture.com" target="_blank" class="text-dracula underline">eloquentarchitecture.com</a><span class="text-marcelin">.</span>
        </p>
    @endauth
</x-output>

<x-input-form />