@props([
    'data' => null,
    'index' => null,
    'type' => 'articles',
])

<a href="{{ route($type.'.show', $data->slug) }}" class="group flex-col flex border-2 border-light-gray justify-center items-center hover:bg-light-gray rounded-lg">
    <img src="{{Storage::disk('public')->url($data->cover)}}" class="rounded-t-lg w-[1200px] h-[300px]" alt="">
    <div class="min-h-[200px] max-w-xl gap-2 space-y-4 p-4 sm:p-6 lg:p-10">
        <x-h3 class="text-center mt-4">{{ $data->title }}</x-h3>
        <x-p class="text-center mt-2">{{ $data->description }}</x-p>
    </div>
</a>
