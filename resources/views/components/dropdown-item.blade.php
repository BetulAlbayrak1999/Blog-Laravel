@props(['active'=>false])

@php
    $clases = 'block text-left px-3 text-sm leading-6 hover:bg-blue-300 focus:bg-gray-300 hover:text-white focus:text-white';

    if($active) $clases .= 'bg-blue-500 text-white';
@endphp

<a {{$attributes(['class'=>$clases])}}>{{$slot}}</a>
