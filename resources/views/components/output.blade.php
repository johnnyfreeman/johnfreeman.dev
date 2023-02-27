@inject('my', 'App\Myself')

@props(['input', 'cache' => false])
<div {{ $attributes->merge([
    'data-controller' => $attributes->prepends('output'),
    'data-terminal-target' => 'output'
]) }}>
    <x-input :value="$input" :cache="$cache" />

    {{ $slot }}
</div>
