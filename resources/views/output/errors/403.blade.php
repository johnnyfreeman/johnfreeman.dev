<div data-terminal-target="output">
    @include('common.input', compact('input'))

    <div class="bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">403</span> {{ __('Forbidden') }}
    </div>
</div>
