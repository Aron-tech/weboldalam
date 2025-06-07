<div>
    <div class="grid grid-cols-1 gap-8">
        <div class="flex">
            <div class="relative w-full max-w-md ml-auto">
                <span class="absolute left-4 sm:left-8 top-1/2 transform -translate-y-1/2 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input wire:model.live.1000ms="search" type="text"
                       class="focus:border-primary bg-none border-2 border-gray-300 shadow-lg py-2 sm:py-4 px-8 sm:px-16 rounded-3xl w-full"
                       placeholder="Keresés...">
            </div>
            <div wire:click="toggleFilter()" class="flex my-auto ml-4 sm:ml-auto rounded-full border-2 {{$show_filter ? 'border-primary' : 'border-gray-300'}} hover:border-primary p-2 sm:p-3 cursor-pointer">
                <svg class="size-4 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </div>
        </div>

        @if($show_filter)
            <div class="bg-white rounded-lg shadow-lg p-6 border-2 border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <x-h3 class="text-lg font-semibold">Szűrő</x-h3>
                    <button @if($selected_statuses || $selected_tags || $sort_by !== 'latest') wire:click="clearFilters" @endif class="{{$selected_statuses || $selected_tags || $sort_by !== 'latest' ? 'text-red-500' : 'text-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 lg:size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium mb-2">Státusz</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($all_statuses as $status)
                            <button wire:click="toggleStatus('{{ $status->value }}')"
                                    class="py-2 px-4 rounded-full border-2 {{ in_array($status->value, $selected_statuses) ? 'border-primary bg-primary-light' : 'border-gray-300' }} hover:border-primary">
                                {{ $status->getLabel() }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="font-medium mb-2">Címkék</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($all_tags as $tag)
                            <button wire:click="toggleTag({{ $tag->id }})"
                                    class="py-2 px-4 rounded-full border-2 {{ in_array($tag->id, $selected_tags) ? 'border-primary bg-primary-light' : 'border-gray-300' }} hover:border-primary">
                                {{ $tag->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="font-medium mb-2">Rendezés</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        @foreach($sort_options as $value => $label)
                            <button wire:click="$set('sort_by', '{{ $value }}')"
                                    class="py-2 px-4 rounded-full border-2 {{ $sort_by === $value ? 'border-primary bg-primary-light' : 'border-gray-300' }} hover:border-primary">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($projects as $project)
                <a href="{{ route('projects.show', $project->slug) }}" class="block w-full">
                    <div class="rounded-lg items-center bg-white gap-4 p-4 sm:p-6 lg:p-10 flex flex-col sm:flex-row justify-between border-light-gray border-4 hover:border-primary cursor-pointer">
                        <div class="flex flex-col mx-auto mb-4 sm:mb-0">
                            <img src="{{ Storage::disk('public')->url($project->cover) }}" alt="Projekt kép" class="object-cover rounded-lg size-24 sm:size-32">
                        </div>
                        <div class="flex-1 flex flex-col items-center justify-center space-y-2 sm:space-y-4">
                            <x-h3 class="text-primary text-lg sm:text-xl lg:text-3xl font-frankruhl font-light">
                                {{ $project->title }}
                            </x-h3>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($project->status->value === \App\Enums\ProjectTypesEnum::INACTIVE->value) bg-gray-100 text-gray-800
                                    @elseif($project->status->value === \App\Enums\ProjectTypesEnum::ACTIVE->value) bg-blue-100 text-blue-800
                                    @elseif($project->status->value === \App\Enums\ProjectTypesEnum::COMPLETED->value) bg-green-100 text-green-800
                                    @elseif($project->status->value === \App\Enums\ProjectTypesEnum::ARCHIVED->value) bg-purple-100 text-purple-800
                                    @endif">
                                    {{ $project->status->getLabel() }}
                                </span>
                            </div>
                            <div class="flex flex-wrap justify-center gap-1 sm:gap-2">
                                @foreach ($project->tags as $tag)
                                    <span class="p-1 sm:p-2 bg-white border-gray-300 border-2 text-xs sm:text-sm text-gray-600 font-semibold rounded-3xl">{{ $tag->name }}</span>
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
</div>
