let currentIndex = 1; // Kezdetben a második kártya van középen (index 1)
const cards = document.querySelectorAll('.card'); // Kártyák kiválasztása
const container = document.getElementById('card-container'); // Kártyák tartója
const totalCards = cards.length; // Összes kártya
const cardWidth = 100 / 3; // Mivel w-1/3, így egy kártya szélessége 33.33%

function moveCard(direction) {
    // Új index kiszámítása
    currentIndex = (currentIndex + direction + totalCards) % totalCards;

    // Eltolás kiszámítása úgy, hogy a középső kártya mindig középre kerüljön
    const offset = -(currentIndex * cardWidth) + (50 - cardWidth / 2);

    // Alkalmazzuk az animációt
    container.style.transition = "transform 0.5s ease-in-out";
    container.style.transform = `translateX(${offset}%)`;

    // Frissítjük az aktív kártyát és az információt
    setTimeout(updateActiveCard, 500);
}

function updateActiveCard() {
    cards.forEach(card => card.classList.remove('scale-110', 'z-10'));

    const activeCard = cards[currentIndex];
    activeCard.classList.add('scale-110', 'z-10');

    // Frissítjük az információs szöveget
    const experience = activeCard.dataset.experience;
    const startYear = activeCard.dataset.startYear;
    const experienceInfo = document.getElementById('experience-info');
    experienceInfo.textContent = `${activeCard.querySelector('h3').textContent} nyelv: ${experience} év tapasztalat, kezdtem: ${startYear}`;
}

// Alapértelmezett frissítés
updateActiveCard();
