@props([
    'data' => null,
])

@if(isset($data))
    <a class="group">
        <img src="{{Storage::disk('public')->url($data->cover)}}" class="rounded-t-lg w-full h-[200px] sm:h-[300px]" alt="">
        <div class="group-hover:bg-light-gray rounded-b-lg min-h-[200px] flex flex-col text-center">
            <x-h3 class="mt-4">{{$data->title}}</x-h3>
            <x-p class="mt-2">{{$data->description}}</x-p>
        </div>
    </a>
@endif
