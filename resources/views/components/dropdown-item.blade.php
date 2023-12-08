@props(['active'=>false])
@php
    $classes="block text-left px-3 py-1 my-1 hover:bg-gray-200 ";
    if($active) $classes .= 'bg-blue-400 font-bold text-white'
@endphp
<a {{ $attributes(['class'=>"$classes"]) }}>{{ $slot }}</a>
