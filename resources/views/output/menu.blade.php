<x-output input="menu" cache>
    <ul class="mt-2 flex flex-wrap space-x-4">
        <li class="inline">
            <x-form.button href="{{ url('about') }}" data-turbo-stream>about</x-form.button>
        </li>
        <li class="inline">
            <x-form.button href="{{ url('blog') }}" data-turbo-stream>blog</x-form.button>
        </li>
        <li class="inline">
            <x-form.button href="{{ url('projects') }}" data-turbo-stream>Projects</x-form.button>
        </li>
        <li class="inline">
            <x-form.button href="{{ url('contact') }}" data-turbo-stream>contact</x-form.button>
        </li>
    </ul>
</x-output>

<x-input-form />