<div data-terminal-target="output">
    @include('common.input', compact('input'))

    <div class="mt-2 bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">405</span> {{ __('Method Not Allowed') }}
    </div>
</div>
