@extends('layouts.app')
@section('content')
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-screen overflow-x-hidden">
        <div class="col-span-1 sm:col-span-2 flex m-0 pt-10 py-4 bg-cover bg-center max-w-screen"
        style="background-image: url('{{ asset('images/blob-haikei.svg') }}');">
            <div class="flex flex-col w-1/2 m-10 p-6 justify-center" data-aos="fade-up-right" data-aos-duration="1000">
                <x-h1>
                    {!! $content['title'] !!}
                </x-h1>
                <x-h4>
                    {!! $content['subtitle'] !!}
                </x-h4>
                <div class="mt-10 flex">
                    <a href="{{ route('contact') }}" class="font-frankruhl font-semibold shadow-primary shadow-lg hover:shadow tracking-wider rounded-3xl text-primary hover:text-light-gray hover:bg-primary border-primary border-2 uppercase text-center py-3 px-8">Kapcsolatfelvétel</a>
                </div>
            </div>
            <img src="{{asset('images/background.png')}}" class="mt-32 hidden lg:block xl:visible 2xl:visible justify-end w-2/4" alt="" data-aos="fade-down-left" data-aos-duration="1000">
        </div>
            <div class="m-10 p-0 sm:p-10 sm:col-span-2">
                <x-h2 data-aos="fade-down" data-aos-duration="800">Legújabb hírek</x-h2>
                <x-splide.content :card_name="'card.project'":content="$articles" />
            </div>
        <div class="mx-10 mb-10 p-6 sm:px-10 sm:pb-10 sm:p-6 sm:col-span-2">
            <x-h2 data-aos="fade-down" data-aos-duration="800">Mivel foglalkozom?</x-h2>
            <div class="mt-6 sm:mt-10 grid sm:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4 justify-between">
                @forelse($content['services'] as $index => $service)
                    <x-card.service :$service :$index />
                @empty
                    <div class="lg:col-span-2 flex flex-col items-center space-y-4 justify-center bg-white shadow-gray-300 shadow-lg hover:shadow border rounded-lg p-6 sm:p-10 h-96" data-aos="fade-up" >
                        <x-h3>Nincs megjeleníthető szolgáltatás!</x-h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
