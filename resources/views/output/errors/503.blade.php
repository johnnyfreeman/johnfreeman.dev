<div data-terminal-target="output">
    @include('common.input', compact('input'))

    <div class="bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">503</span> {{ __('Service Unavailable') }}
    </div>
</div>
