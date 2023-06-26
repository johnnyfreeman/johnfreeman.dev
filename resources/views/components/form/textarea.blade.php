@props([])
<textarea {{ $attributes->class([
    'appearance-none block w-full bg-nosferatu-50/30 shadow-inner text-nosferatu-700 border border-nosferatu-50 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-buffy-500 light:focus:border-buffy-600',
]) }}>{{ $slot }}</textarea>