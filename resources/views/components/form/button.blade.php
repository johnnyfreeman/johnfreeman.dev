@props([])
@if($attributes->has('href'))
    <a {{ $attributes->class([
        'inline-flex items-center font-semibold uppercase tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 shadow border border-purple-500 light:bg-blue-600 text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-4 h-10',
    ]) }} >{{ $slot }}</a>
@else
    <button {{ $attributes->merge([
        'type' => 'button',
        'data-form-target' => 'submit',
    ])->class([
        'inline-flex items-center font-semibold uppercase tracking-wide bg-gradient-to-r from-purple-500 to-indigo-500 shadow border border-purple-500 light:bg-blue-600 text-white text-xs hover:bg-blue-500 light:hover:bg-blue-700 px-4 h-10',
    ]) }} >{{ $slot }}</button>
@endif