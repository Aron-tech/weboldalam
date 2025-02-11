<div id="image-container" class="relative w-full h-96">
    <img id="current-image" class="w-full h-full object-cover absolute transition-opacity duration-1000" src="" alt="Kép">
</div>

<!-- Vezérlőgombok -->
<div id="controls" class="flex justify-center p-4 space-x-4 bg-gray-50">
    <button id="prev-btn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Előző</button>
    <button id="stop-btn" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Megállítás</button>
    <button id="next-btn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Következő</button>
</div>
</div>

<script>
// Blade-ből átadott JSON adatok
const images = @json($images);

// JavaScript kód
document.addEventListener('DOMContentLoaded', function () {
    const currentImage = document.getElementById('current-image');
    const prevBtn = document.getElementById('prev-btn');
    const stopBtn = document.getElementById('stop-btn');
    const nextBtn = document.getElementById('next-btn');

    let currentIndex = 0;
    let intervalId = null;

    // Véletlenszerű animáció
    function getRandomAnimation() {
        const animations = ['fade', 'slide-left', 'slide-right', 'zoom-in', 'zoom-out'];
        return animations[Math.floor(Math.random() * animations.length)];
    }

    // Képváltás
    function changeImage(index) {
        currentImage.classList.add('opacity-0'); // Eltűnik a kép
        setTimeout(() => {
            currentImage.src = images[index].url; // Új kép betöltése
            currentImage.classList.remove('opacity-0'); // Megjelenik a kép
        }, 500);
    }

    // Automatikus lejátszás
    function startSlideshow() {
        intervalId = setInterval(() => {
            currentIndex = (currentIndex + 1) % images.length;
            changeImage(currentIndex);
        }, 5000); // 5 másodperc
    }

    // Előző kép
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        changeImage(currentIndex);
    });

    // Következő kép
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        changeImage(currentIndex);
    });

    // Megállítás
    stopBtn.addEventListener('click', () => {
        clearInterval(intervalId);
    });

    // Oldal betöltésekor indítsd az automatikus lejátszást
    startSlideshow();
});
</script>
