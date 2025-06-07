<div class="my-auto splide project p-10" id="splide-project">
    <x-h2 class="mb-6" data-aos="fade-left" data-aos-duration="600">{{$slot}}</x-h2>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($projects as $index => $project)
                <li class="splide__slide">
                    <x-card.project_slide :data="$project" :index="$index" />
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-8 flex space-x-4 justify-end">
        <x-splide.navigation-button :is_blue="true" :target_name="'project'" />
    </div>
</div>
