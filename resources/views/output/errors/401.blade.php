<div data-target="terminal.output">
    @include('common.input', compact('input'))

    <div class="mt-2 bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">401</span> {{ __('Unauthorized') }}
    </div>
</div>
