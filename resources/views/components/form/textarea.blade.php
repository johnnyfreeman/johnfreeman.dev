@props([])
<textarea {{ $attributes->class([
    'appearance-none block w-full bg-gray-100 shadow-inner text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 light:focus:border-blue-600',
]) }}>{{ $slot }}</textarea>