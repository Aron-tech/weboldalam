@extends('layouts.app')
@section('title', $article->title)
@section('content')
    <x-splide.banner :page="$article" />
    <div class="mt-6 sm:mt-10 lg:mt-20 w-[80%] mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-8 gap-4">
            <div class="col-span-2">
                @foreach($article->blocks as $block)
                    {!! \Sevendays\FilamentPageBuilder\Facades\BlockRenderer::renderBlock($block) !!}
                @endforeach
            </div>
        </div>
    </div>
@endsection
