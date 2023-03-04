@props(['active'=>false])
@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-300  focus:bg-blue-300';

    if($active) $classes .= 'bg-blue-300 text-blue-700';
@endphp
<a {{ $attributes(['class'=>$classes]) }}>{{ $slot }}</a>
