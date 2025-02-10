<div class="grid grid-cols-1 gap-8">
    <!-- Keresőmező -->
    <div class="flex justify-center items-center">
        <div class="relative w-full max-w-md">
            <span class="absolute left-4 sm:left-8 top-1/2 transform -translate-y-1/2 text-gray-500">
                <i class="fas fa-search"></i>
            </span>
            <input wire:model="search" type="text" class="bg-none border-2 border-gray-300 shadow-lg py-2 sm:py-4 px-8 sm:px-16 rounded-3xl w-full" placeholder="Keresés...">
        </div>
    </div>

    <!-- Projekt kártyák -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach ($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="block w-full">
                <div class="rounded-lg bg-white p-4 sm:p-6 md:p-10 flex flex-col sm:flex-row justify-between items-start border-bg-color border-4 hover:border-primary cursor-pointer">
                    <div class="flex flex-col items-center mx-auto mb-4 sm:mb-0">
                        <img src="{{ asset($project->cover) }}" alt="Projekt kép" class="object-cover rounded-lg w-24 h-24 sm:w-32 sm:h-32">
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center space-y-2 sm:space-y-4">
                        <h3 class="mb-2 sm:mb-4 text-primary text-lg sm:text-xl lg:text-3xl font-frankruhl font-light">
                            {{ $project->title }}
                        </h3>
                        <div class="flex flex-wrap justify-center gap-2">
                            @foreach ($project->tags as $tag)
                                <span class="p-2 sm:p-4 bg-white border-gray-300 border-2 text-xs sm:text-sm text-gray-600 font-semibold rounded-3xl">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $projects->links() }}
    </div>
</div>
