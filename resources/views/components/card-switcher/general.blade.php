<div class="relative flex justify-center items-center overflow-hidden w-full">
    <div id="framework-container" class="flex transition-transform duration-500">
        @foreach($frameworks as $index => $framework)
            <div class="bg-white/70 rounded-lg p-6 sm:p-10 text-center w-3/4 sm:w-1/3 flex-shrink-0 framework-card" data-experience="{{ $framework['experience'] }}" data-start-year="{{ $framework['start_year'] }}">
                {!! $framework['icon'] !!}
                <h3 class="text-lg sm:text-xl">{{ $framework['name'] }}</h3>
            </div>
        @endforeach
    </div>

    <!-- Váltó gombok -->
    <button onclick="moveFramework(-1)" class="absolute left-0 text-white bg-black/50 px-4 py-2 rounded-full">←</button>
    <button onclick="moveFramework(1)" class="absolute right-0 text-white bg-black/50 px-4 py-2 rounded-full">→</button>
</div>

<!-- Tapasztalat és kezdési év megjelenítése -->
<div id="framework-info" class="mt-5 text-center text-lg"></div>

<script>
    let currentFrameworkIndex = 1; // Kezdetben a második kártya van középen (index 1)
    const frameworkCards = document.querySelectorAll('.framework-card'); // Kártyák kiválasztása
    const frameworkContainer = document.getElementById('framework-container'); // Kártyák tartója
    const totalFrameworkCards = frameworkCards.length; // Összes kártya
    const frameworkCardWidth = 100 / 3; // Mivel w-1/3, így egy kártya szélessége 33.33%

    function moveFramework(direction) {
        // Új index kiszámítása
        currentFrameworkIndex = (currentFrameworkIndex + direction + totalFrameworkCards) % totalFrameworkCards;

        // Eltolás kiszámítása úgy, hogy a középső kártya mindig középre kerüljön
        const offset = -(currentFrameworkIndex * frameworkCardWidth) + (50 - frameworkCardWidth / 2);

        // Alkalmazzuk az animációt
        frameworkContainer.style.transition = "transform 0.5s ease-in-out";
        frameworkContainer.style.transform = `translateX(${offset}%)`;

        // Frissítjük az aktív kártyát és az információt
        setTimeout(updateActiveFrameworkCard, 500);
    }

    function updateActiveFrameworkCard() {
        frameworkCards.forEach(card => card.classList.remove('scale-110', 'z-10'));

        const activeFrameworkCard = frameworkCards[currentFrameworkIndex];
        activeFrameworkCard.classList.add('scale-110', 'z-10');

        // Frissítjük az információs szöveget
        const experience = activeFrameworkCard.dataset.experience;
        const startYear = activeFrameworkCard.dataset.startYear;
        const frameworkInfo = document.getElementById('framework-info');
        frameworkInfo.textContent = `${activeFrameworkCard.querySelector('h3').textContent} keretrendszer: ${experience} év tapasztalat, kezdtem: ${startYear}`;
    }

    // Alapértelmezett frissítés
    updateActiveFrameworkCard();
</script>
