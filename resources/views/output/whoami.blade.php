<x-output input="whoami">
    <p class="">
        @auth
            {{ auth()->user()->email }}
        @else
            guest@johnfreeman.dev
        @endauth
    </p>
</x-output>
