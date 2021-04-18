<div data-controller="output" data-terminal-target="output">
    @include('common.input', [
        'input' => 'whoami',
        'cache' => false,
    ])

    <p class="">
        @auth
            {{ auth()->user()->email }}
        @else
            guest@johnfreeman.dev
        @endauth
    </p>
</div>
