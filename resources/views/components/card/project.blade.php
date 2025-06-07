<div class="bg-white rounded-lg grid grid-cols-[1fr_2fr_1fr] p-6 sm:p-10 min-h-[126px]" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
    <div>
        <img src="{{Storage::disk('public')->url($project->cover)}}" class="rounded-lg" alt="">
    </div>
    <div class="flex items-center justify-center">
        <h3 class="text-xl sm:text-3xl font-frankruhl font-light">{{$project->title}}</h3>
    </div>
    <div class="flex items-center justify-center">
        <a href="{{ route('projects.show', $project->slug) }}" class="hover:text-primary">
            <svg class="size-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
          </a>
    </div>
</div>
