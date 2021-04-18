@inject('my', 'App\Myself')

<div data-controller="output" data-terminal-target="output">
    @include('common.input', ['input' => 'intro'])

    <p>What<span class="text-red-400">'</span>s up<span class="text-red-400">!</span> I<span class="text-red-400">'</span>m {{ $my->nickname }}<span class="text-red-400">,</span><br>a details<span class="text-red-400">-</span>oriented<span class="text-red-400">,</span> maker of things<span class="text-red-400">.</span></p>
</div>
