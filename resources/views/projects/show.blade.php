@extends('layouts.app')
@section('title', $project->title)
@section('content')
 <x-splide.banner :page="$project" />
<div class="mt-6 sm:mt-10 lg:mt-20 w-[80%] sm:w-[90%] mx-auto min-h-screen">
        @foreach($project->blocks as $block)
            {!! \Sevendays\FilamentPageBuilder\Facades\BlockRenderer::renderBlock($block) !!}
        @endforeach
</div>
@endsection
