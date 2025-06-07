<style>
    .splide__pagination__page {
        background-color: #626e73;
        margin-right: 0.5rem;
    }

    @media (min-width: 1024px) {
        .splide__pagination__page {
            margin-right: 4rem;
        }
    }

    @media (min-width: 640px) {
        .splide__pagination__page {
            margin-right: 2rem;
        }
    }
    .splide__pagination__page.is-active {
        background-color: #3c8acf;
    }
</style>
@if(count($page->images) > 0)
<div class="splide general mt-20 relative w-full">
    <div class="splide__track relative">
        <div class="hidden md:flex absolute bottom-1/2 bg-gradient-to-l from-primary to-blue-600 py-4 px-8 sm:py-6 sm:px-10 lg:py-8 lg:px-12 rounded-r-lg z-50">
            <x-h1 class="text-white">{{ $page->title }}</x-h1>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 from-20% z-10 w-[90%]"></div>
        <ul class="splide__list">
            @foreach ($page->images as $image)
                <li class="splide__slide">
                    <img src="{{ Storage::disk('public')->url($image) }}" alt="Project Image" class="object-cover rounded-r-lg w-[90%] h-[24rem] sm:h-[40rem]">
                </li>
            @endforeach
        </ul>
    </div>
    <div class="absolute bottom-2 sm:bottom-4 right-16 sm:right-28 lg:right-48 transform flex gap-2">
       <x-splide.navigation-button/>
    </div>
</div>
<div class="md:hidden mt-4 max-w-[90%] bg-gradient-to-l from-primary to-blue-600 p-4 rounded-r-lg">
    <x-h1 class="text-white">{{ $page->title }}</x-h1>
</div>
@endif