<div data-target="terminal.output">
    @include('common.input', compact('input'))

    <div class="bg-red-400 text-white p-3 rounded-lg">
        <span class="font-bold">429</span> {{ __('Too Many Requests') }}
    </div>
</div>
