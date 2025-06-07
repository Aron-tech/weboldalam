@extends('layouts.app')
@section('title', 'Rólam')
@section('content')
<div class="grid grid-cols-1 grid-rows-[auto_1fr] max-w-screen overflow-x-hidden">
    <div class="my-10">
        <div class="mt-20 sm:mt-10 p-6 sm:p-10 grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-cover bg-center min-h-screen">
            <div class="flex justify-center" data-aos="fade-down-right" data-aos-duration="1000">
                <img src="{{ Storage::disk('public')->url($content['image']) }}" alt="Papp Áron"
                    class="rounded-full w-64 h-64 object-cover shadow-lg shadow-primary">
            </div>

            <div class="space-y-6 mr-6" data-aos="fade-down-left" data-aos-duration="1000">
                <x-h1 class="!text-6xl">
                    {!! $content['title'] !!}
                </x-h1>
                @forelse ($content['p'] as $p)
                    <p class="text-lg font-opensans text-justify">
                        {!! $p['text'] !!}
                    </p>
                @empty
                    <p class="text-lg font-opensans text-justify">

                    </p>
                @endforelse
                <div class="pt-4">
                    <a href="{{ route('download', ['file_path' => $content['oneletrajz'], 'name' => 'Papp_Áron_Önéletrajz.pdf']) }}" class="font-frankruhl font-semibold shadow-primary shadow-lg hover:shadow tracking-wider rounded-3xl text-primary hover:text-light-gray hover:bg-primary border-primary border-2 uppercase text-center py-3 px-8">Önéletrajz letöltése</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-light-gray max-w-screen grid grid-cols-1 gap-8 sm:p-10 p-6 mx-auto max-w-screen overflow-x-hidden">
    <div class="sm:mt-10 mt-6 mb-auto flex justify-center" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="text-gray-800 font-light text-3xl sm:text-4xl font-frankruhl mb-10">Tanulmányaim</h2>
    </div>
    @foreach ($content['education'] as $index => $education)
        <div class="flex flex-col md:flex-row w-[90%] mx-auto {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }} items-center gap-8 lg:gap-20">
            <img src="{{ Storage::disk('public')->url($education['logo']) }}" class="w-64 h-64 object-cover border-4 border-primary rounded-3xl" data-aos-duration="800" @if($index % 2 === 1) data-aos="fade-left" @else data-aos="fade-right" @endif alt="">
            <div class="flex flex-col justify-center items-center gap-4 text-center max-w-2xl" data-aos-duration="800" data-aos-delay="{{ $index * 200 }}" @if($index % 2 === 1) data-aos="fade-right" @else data-aos="fade-left" @endif>
                <h3 class="text-xl sm:text-3xl font-frankruhl font-light">{{ $education['name'] }}</h3>
                <x-h4>{{ $education['title'] }}</x-h4>
                <p class="text-lg font-opensans">{{ $education['year'] }}</p>
                <a href="{{ $education['link'] }}" target="_blank" class="text-gray-400 text-lg font-opensans">Intézmény weboldalának megtekintése</a>
            </div>
        </div>
    @endforeach
</div>
<div class="bg-light-gray max-w-screen grid grid-cols-1 gap-8 sm:p-10 p-6 mx-auto max-w-screen overflow-x-hidden">
    <div class="sm:mt-10 mt-6 mb-auto flex justify-center" data-aos="fade-down" data-aos-duration="1000">
        <h2 class="text-gray-800 font-light text-3xl sm:text-4xl font-frankruhl mb-10">Tapasztalataim</h2>
    </div>
    @foreach ($content['companies'] as $index => $company)
        <div class="flex flex-col md:flex-row w-[90%] mx-auto {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }} items-center gap-8 lg:gap-20">
            <img src="{{ Storage::disk('public')->url($company['logo']) }}" class="w-64 h-64 object-cover border-4 border-primary rounded-3xl" data-aos-duration="800" @if($index % 2 === 1) data-aos="fade-left" @else data-aos="fade-right" @endif alt="">
            <div class="flex flex-col justify-center items-center gap-4 text-center max-w-2xl" data-aos-duration="800" data-aos-delay="{{ $index * 200 }}" @if($index % 2 === 1) data-aos="fade-right" @else data-aos="fade-left" @endif>
                <h3 class="text-xl sm:text-3xl font-frankruhl font-light">{{ $company['name'] }}</h3>
                <x-h4>{{ $company['title'] }}</x-h4>
                <p class="text-lg font-opensans">{{ $company['period'] }}</p>
                <a href="{{ $company['link'] }}" target="_blank" class="text-gray-400 text-lg font-opensans">Cég weboldalának megtekintése</a>
            </div>
        </div>
    @endforeach
</div>
<div class="max-w-screen overflow-x-hidden grid grid-cols-1 lg:grid-cols-3 gap-6 p-6 sm:p-10">
    <div class="p-6 flex flex-col items-center">
        <h3 class="text-2xl font-frankruhl font-light mb-4" data-aos="fade-down" data-aos-duration="1000">Programozási nyelvek</h3>
        <div class="w-full space-y-4"  data-aos="fade-right" data-aos-duration="800">
           @foreach ($content['languages'] as $index => $language)
            <div class="flex items-center">
                <img src="{{ Storage::disk('public')->url($language['svg']) }}" class="svg-size" alt="">
                <div class="ml-4 w-full">
                    <p class="text-lg font-opensans">{{$language['name']}}</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary h-2.5 rounded-full" style="width: {{ $language['percent'] . '%' }};"></div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
    <div class="p-6 flex flex-col items-center justify-center" data-aos="fade-up" data-aos-duration="1000">
        <p class="text-lg font-opensans text-center">
            {{ $content['last_body'] }}
        </p>
    </div>
    <div class="p-6 flex flex-col items-center">
        <h3 class="text-2xl font-frankruhl font-light mb-4" data-aos="fade-down" data-aos-duration="1000">Keretrendszerek</h3>
        <div class="w-full space-y-4"  data-aos="fade-left" data-aos-duration="800">
            @foreach ($content['frameworks'] as $index => $framework)
            <div class="flex items-center">
                <img src="{{ Storage::disk('public')->url($framework['svg']) }}" class="svg-size" alt="">
                <div class="ml-4 w-full">
                    <p class="text-lg font-opensans">{{$framework['name']}}</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-primary h-2.5 rounded-full" style="width: {{ $framework['percent'] . '%' }};"></div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>
@endsection
