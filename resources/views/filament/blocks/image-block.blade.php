<div class="my-4">
    @if(isset($title))
        <x-h3>{{ $title }}</x-h3>
    @endif
    <img class="w-full rounded-lg" src="{{ Storage::disk('public')->url($image) }}" alt="{{ $alt }}">
    @if(isset($caption))
        <x-p class="text-center mt-2">{{ $caption }}</x-p>
    @endif
</div>