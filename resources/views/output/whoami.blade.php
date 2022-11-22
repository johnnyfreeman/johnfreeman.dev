<div data-controller="output" data-terminal-target="output">
    <x-input value="whoami" :cache="false" />

    <p class="">
        @auth
            {{ auth()->user()->email }}
        @else
            guest@johnfreeman.dev
        @endauth
    </p>
</div>
