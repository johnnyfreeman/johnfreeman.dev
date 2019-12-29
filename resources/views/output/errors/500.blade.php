<div data-target="terminal.output">
    @include('common.input', compact('input'))

    <div class="mt-8 bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">500</span> {{ __('Server Error') }}
    </div>
</div>
