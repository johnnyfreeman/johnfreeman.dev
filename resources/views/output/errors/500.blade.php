<div data-terminal-target="output">
    <x-input :value="$input" />

    <div class="bg-marcelin text-white p-3 rounded-lg">
        <span class="font-bold">500</span> {{ __(!empty($message) ? $message : 'Server Error') }}
    </div>
</div>
