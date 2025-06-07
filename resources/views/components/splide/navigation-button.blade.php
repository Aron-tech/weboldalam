@props([
    'target_name' => 'general',
    'is_blue' => false,
])
<button class="{{ $target_name }}-prev {{ $is_blue ? 'text-blue-600 hover:text-primary' : 'text-white hover:text-white/80' }}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
    </svg>
</button>
<div class="{{ $is_blue ? 'text-blue-600' : 'text-white' }}">
    <svg width="2" height="100%" viewBox="0 0 2 22" fill="none" class="size-4 sm:size-6" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.00049 21.9773L1.00024 10.9886L1 -1.33514e-05" stroke="currentColor"></path>
        <path d="M1.00049 21.9773L1.00024 10.9886L1 -1.33514e-05" stroke="currentColor"></path>
    </svg>
</div>
<button class="{{ $target_name }}-next {{ $is_blue ? 'text-blue-600 hover:text-primary' : 'text-white hover:text-white/80' }}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
    </svg>
</button>