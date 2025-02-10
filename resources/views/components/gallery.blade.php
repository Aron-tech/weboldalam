<div>
    <div id="gallery-{{ $id }}" class="p-8">
        <image-gallery :images='@json($images)'></image-gallery>
    </div>

    <script>
        const { createApp } = Vue;

        import ImageGallery from '../../resources/js/components/ImageGallery.vue';

        createApp({
            components: {
                ImageGallery
            }
        }).mount('#gallery-{{ $id }}');
    </script>
</div>
