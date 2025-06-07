@props([
    'service' => null,
    'index' => null,
])

<div class="flex flex-col items-center space-y-4 justify-center bg-white rounded-lg p-6 sm:p-10 h-96" data-aos-delay="{{$index*100+200}}" data-aos="fade-up" >
    <img class="size-24" src="{{ Storage::disk('public')->url($service['svg']) }}" alt="">
    <x-h3 class="text-center">{{$service['title']}}</x-h3>
</div>
