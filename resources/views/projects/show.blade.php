@extends('layouts.app')

@section('content')
<div class="sm:max-w-7xl mx-auto p-6">
    <div id="images-container" class="mt-20 mb-10 relative max-w-1/2 h-96 flex justify-center rounded-3xl overflow-hidden"  data-images='@json(collect($project->images)->map(fn($img) => asset($img)))'>
        @vite('resources/js/image_changer.js')
    </div>
    <h1>{{ $project->title }}</h1>
    <div class="grid grid-cols-3 sm:gap-8 gap-4">
        <div class="col-span-2">
            <p class="text-gray-700 text-lg mt-4 leading-relaxed">{{ $project->body }}</p>
        </div>
        <div class="grid grid-rows-5 items-center">
            <div>
                <p class="mt-4 text-sm text-gray-500">Státusz: <span class="inline-block w-4 h-4 rounded-full"></span></p>
            </div>
            <div>
                <p class="mt-4 text-sm text-gray-500">Kezdet: <span class="font-semibold text-gray-900">{{ $project->start_date }}</span></p>
                @if($project->end_date)
                    <p class="mt-4 text-sm text-gray-500">Befejezés: <span class="font-semibold text-gray-900">{{ $project->end_date }}</span></p>
                @endif
            </div>
            <div class="flex items-center">
                <a href="{{ $project->github }}" target="_blank" class="text-center px-6 py-3 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transform hover:scale-105 transition duration-300">
                    GitHub Repo
                </a>
            </div>
            <div>
                @if($project->demo)
                    <a href="{{ $project->demo }}" target="_blank" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-500 transform hover:scale-105 transition duration-300 ease-in-out">
                        Élő Demo
                    </a>
                @endif
            </div>
            <div>
                @if($project->tags->count() > 0)
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-800">Technológiák:</h2>
                        <div class="flex flex-wrap mt-2">
                            @foreach($project->tags as $tag)
                                <span class="px-4 py-2 bg-gray-200 rounded-full text-sm font-medium text-gray-700 mr-2 mb-2 transition-all transform hover:scale-110 hover:bg-gray-300 cursor-pointer">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
