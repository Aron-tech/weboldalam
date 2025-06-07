@if(isset($item))
    <a href="{{ route($item->route) }}" class="font-robotoslab text-lg {{ $item->isActive() ? 'text-primary scale-110 opacity-100 font-semibold' : 'text-gray-800 font-medium hover:scale-110 opacity-80 hover:opacity-100 hover:text-primary hover:font-semibold'}}">
        {{ $item->label }}
    </a>
@endif