@props([
    'link' => null,
    'type' => 'button'
])

@if($link)
    <a href="{{$link}}" {{ $attributes->merge(['class' => 'btn text-white']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{$type}}" {{ $attributes->merge(['class' => 'btn text-white']) }}>
        {{ $slot }}
    </button>
@endif