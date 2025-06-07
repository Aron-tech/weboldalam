<a class="text-xl text-white hover:opacity-100 {{ $item->isActive()  ? 'opacity-100' : 'opacity-80'}}" href="{{ route($item->route) }}">{{ $item->label }}</a>
