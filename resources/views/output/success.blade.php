<div data-terminal-target="output">
    @include('common.input', [
        'input' => $input,
        'cache' => false,
    ])

    <div class="bg-green-400 text-white p-3 rounded-lg">
        <span class="font-bold">200</span> {{ $message }}
    </div>
</div>
