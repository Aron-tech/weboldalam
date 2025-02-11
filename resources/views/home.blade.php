@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-screen">
        <div class="col-span-1 sm:col-span-2 flex m-0 pt-10 py-4 bg-cover bg-center"
        style="background-image: url('{{ asset('images/blob-haikei.svg') }}');">
            <div class="flex flex-col w-1/2 m-10 p-6 justify-center" data-aos="fade-up-right" data-aos-duration="1000">
                <h1 class="text-left font-frankruhl font-light text-6xl">
                    Üdvözöllek <span class="text-primary">Papp Áron</span>  weboldalán!
                </h1>
                <h4 class="text-primary font-opensans font-semibold sm:text-2xl text-lg">
                    A weboldalon megtalálsz rólam információkat, illetve milyen projekteket készítettem el, foglalkoztam.
                </h4>
                <div class="mt-10 flex">
                    <a href="{{ route('contact') }}" class="font-frankruhl font-semibold shadow-primary shadow-lg hover:shadow tracking-wider rounded-3xl text-primary hover:text-bg-color hover:bg-primary border-primary border-2 uppercase text-center py-3 px-8">Kapcsolatfelvétel</a>
                </div>
            </div>
            <img src="{{asset('images/background.png')}}" class="mt-32 hidden lg:block xl:visible 2xl:visible justify-end w-2/4" alt="" data-aos="fade-down-left" data-aos-duration="1000">
        </div>
        <div class="m-10 p-0 sm:p-10">
            <h2 class="text-gray-800 font-light text-2xl sm:text-4xl font-frankruhl" data-aos="fade-down" data-aos-duration="800">Legújabb hírek</h2>
            <div class="mt-6 sm:mt-10 grid grid-cols-1 grid-rows-3 gap-4 justify-between">
                @foreach ($articles as $article)
                <div class="bg-white shadow-gray-300 shadow-lg hover:shadow border rounded-lg p-6 sm:p-10 max-h-auto" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div>
                        <h3 class="mb-4 text-xl sm:text-3xl font-frankruhl font-light">{{ $article->title }}</h3>
                        <p class="font-medium text-gray-600 text-sm sm:text-base">
                            {{ $article->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="m-10 p-6 sm:p-10">
            <h2 class="text-gray-800 font-light text-2xl sm:text-4xl font-frankruhl" data-aos="fade-down" data-aos-duration="800">Mivel foglalkozom?</h2>
            <div class="mt-6 sm:mt-10 grid lg:grid-cols-2 grid-cols-1 grid-rows-3 gap-4 justify-between">
                <div class="flex flex-col items-center justify-center bg-white shadow-gray-300 shadow-lg hover:shadow border rounded-lg p-6 sm:p-10 lg:h-96" data-aos="fade-up">
                    <i class="mb-2 text-6xl fa-brands fa-wordpress"></i>
                    <h3 class="text-xl sm:text-3xl font-frankruhl font-light text-center">WordPress weboldal készítés</h3>
                </div>
                <div class="w-full flex flex-col items-center justify-center bg-white rounded-lg p-6 sm:p-10 shadow-lg shadow-gray-300 hover:shadow" data-aos="fade-up">
                    <i class="mb-2 text-6xl fa-regular fa-file-word"></i>
                    <h3 class="text-xl sm:text-3xl font-frankruhl font-light text-center">Egyszerű weboldlal készítése</h3>
                </div>
                <div class="w-full flex flex-col items-center justify-center bg-white rounded-lg p-6 sm:p-10 shadow-lg shadow-gray-300 hover:shadow" data-aos="fade-up" data-aos-delay="200">
                    <i class="mb-2 text-6xl fas fa-sitemap"></i>
                    <h3 class="text-xl sm:text-3xl font-frankruhl font-light text-center">Komplex webalkalmazás készítés</h3>
                </div>
                <div class="w-full flex flex-col items-center justify-center bg-white rounded-lg p-6 sm:p-10 shadow-lg shadow-gray-300 hover:shadow" data-aos="fade-up" data-aos-delay="200">
                    <i class="mb-2 text-6xl fa-brands fa-discord"></i>
                    <h3 class="text-xl sm:text-3xl font-frankruhl font-light text-center">Egyedi Discord bot készítés</h3>
                </div>
            </div>
        </div>
        <div class="sm:col-span-2 p-10 sm:p-16 grid grid-cols-1 sm:grid-cols-2 gap-6 m-0 py-4 bg-cover bg-center"
        style="background-image: url('{{ asset('images/bgnew.svg') }}');">
            <div class="hidden lg:visible lg:block" data-aos="fade-right" data-aos-duration="600">
                <img src="{{asset('images/pngegg.png')}}" alt="">
            </div>

            <div class="justify-center w-full flex flex-col space-y-4">
                <h2 class="text-gray-800 font-light text-2xl sm:text-4xl font-frankruhl" data-aos="fade-left" data-aos-duration="600">Aktuális munkáim</h2>
                @foreach ($projects as $project)
                    <x-card.project :project="$project" :index="$loop->index"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
