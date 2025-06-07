<div class="after:clear-both">
    <figure
        class="not-prose {{ $image_alignment === 'left' ? 'lg:float-left lg:mr-4' : 'lg:float-right lg:ml-4' }} mx-auto mb-4 max-w-96 text-center lg:mx-0 lg:text-left">
        <a href="{{ Storage::disk('public')->url($image) }}" data-fslightbox>
            <img
                class="not-prose rounded-lg"
                src="{{ Storage::disk('public')->url($image) }}"
                alt="{{ $alt }}">
        </a>

        @if(isset($caption))
            <figcaption class="text-sm text-gray-500">
                {{ $caption }}
            </figcaption>
        @endif
    </figure>
    <div class="prose max-w-none prose-p:text-gray-600 prose-p:text-sm prose-p:sm:text-base prose-h2:text-gray-800 prose-h2:font-light prose-h2:text-2xl prose-h2:sm:text-4xl prose-h2:font-frankruhl prose-h3:text-xl prose-h3:sm:text-3xl prose-h3:font-frankruhl prose-h3:font-light">
        {!! $content ?? "Nem létező tartalom!" !!}
    </div>
</div>