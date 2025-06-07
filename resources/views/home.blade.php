@extends('layouts.app')
@section('title', 'Kezdőlap')
@section('content')
    <x-container>
        <div class="flex w-full max-h-screen h-screen bg-white">
            <div class="w-full my-auto sm:mt-60 lg:my-auto sm:w-1/2" data-aos="fade-up-right" data-aos-duration="1000">
                <x-h1>{!! $content['title'] !!}</x-h1>
                <x-h4>
                    {!! $content['subtitle'] !!}
                </x-h4>
                <div class="mt-10 flex">
                    <x-a href="{{route('contact')}}">Kapcsolatfelvétel</x-a>
                </div>
            </div>
            <div class="hidden sm:block sm:mt-80 lg:my-auto sm:w-1/2" data-aos="fade-down-left" data-aos-duration="1000">
                <img src="{{asset('images/home.svg')}}" alt="">
            </div>
        </div>
        @if($articles->isNotEmpty())
            <x-h2 class="mb-10" data-aos="fade-down" data-aos-duration="800">Hírek</x-h2>
            <x-splide.content :content="$articles"/>
            <x-stripe class="my-20"/>
        @endif
        @if($projects->isNotEmpty())
            <x-h2 class="mb-10 my-20" data-aos="fade-down" data-aos-duration="800">Projektek</x-h2>
            <x-splide.content :content="$projects" :type="'projects'"/>
            <x-stripe class="my-20"/>
        @endif
        <x-h2 data-aos="fade-down" data-aos-duration="800">Mivel foglalkozom?</x-h2>
        <div class="mb-20 sm:mb-0 min-h-[60vh] mt-6 sm:mt-10 grid sm:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">
            @forelse($content['services'] as $index => $service)
                <x-card.service :$service :$index />
            @empty
                <div class="lg:col-span-2 flex flex-col items-center space-y-4 justify-center bg-white shadow-gray-300 shadow-lg hover:shadow border rounded-lg p-6 sm:p-10 h-96" data-aos="fade-up" >
                    <x-h3>Nincs megjeleníthető szolgáltatás!</x-h3>
                </div>
            @endforelse
        </div>
    </x-container>
@endsection
