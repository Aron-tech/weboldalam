<x-filament::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}
        <div class="h-5 w-full">
        </div>
        <x-filament::button type="submit">
            Mentés
        </x-filament::button>
    </form>
</x-filament::page>
