@props([
    'content' => null,
    'type' => null,
])

@if(isset($content) && $content->count() > 0)
    <div class="splide content mt-6 sm:mt-10 flex justify-between" data-aos="fade-down" data-aos-delay="200" data-aos-duration="800">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($content as $index => $data)
                    <li class="splide__slide">
                        <x-card.main :$type :$data :$index />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="mt-8 flex space-x-4 justify-end">
        <x-splide.navigation-button :is_blue="true" :target_name="'content'" />
    </div>
@endif
