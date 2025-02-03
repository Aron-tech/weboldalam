<div class="relative flex justify-center items-center overflow-hidden">
    <!-- Kártyák konténer -->
    <div class="flex transition-transform duration-500 transform" id="project-container" style="position:relative; display: flex;">
        <!-- Példa projektek -->
        <div class="bg-white/70 rounded-lg p-6 sm:p-10 flex items-center w-3/4 sm:w-1/3 flex-shrink-0 project-card"
            data-github="https://github.com/peldaprojekt1"
            data-start="2023-05"
            data-end="2023-12"
            data-more="https://projektem.hu/1">
            <img src="https://via.placeholder.com/100" alt="Projekt 1" class="w-24 h-24 object-cover rounded-lg mr-4">
            <h3 class="text-lg sm:text-xl">Social Platform</h3>
        </div>

        <div class="bg-white/70 rounded-lg p-6 sm:p-10 flex items-center w-3/4 sm:w-1/3 flex-shrink-0 project-card"
            data-github="https://github.com/peldaprojekt2"
            data-start="2022-08"
            data-end="2023-02"
            data-more="https://projektem.hu/2">
            <img src="https://via.placeholder.com/100" alt="Projekt 2" class="w-24 h-24 object-cover rounded-lg mr-4">
            <h3 class="text-lg sm:text-xl">Laravel Chat App</h3>
        </div>

        <div class="bg-white/70 rounded-lg p-6 sm:p-10 flex items-center w-3/4 sm:w-1/3 flex-shrink-0 project-card"
            data-github="https://github.com/peldaprojekt3"
            data-start="2024-01"
            data-end="Folyamatban"
            data-more="https://projektem.hu/3">
            <img src="https://via.placeholder.com/100" alt="Projekt 3" class="w-24 h-24 object-cover rounded-lg mr-4">
            <h3 class="text-lg sm:text-xl">Livewire Dashboard</h3>
        </div>
    </div>

    <!-- Váltó gombok -->
    <button onclick="moveProject(-1)" class="absolute left-0 text-white bg-black/50 px-4 py-2 rounded-full">←</button>
    <button onclick="moveProject(1)" class="absolute right-0 text-white bg-black/50 px-4 py-2 rounded-full">→</button>
</div>

<!-- Kijelölt projekt információ -->
<div id="project-info" class="mt-5 text-center text-lg"></div>

<script>
    let currentIndex = 0;  // Kijelölt projekt indexe
    const projects = document.querySelectorAll('.project-card');
    const container = document.getElementById('project-container');
    const infoBox = document.getElementById('project-info');

    // Projekt információk frissítése
    function updateProjectInfo() {
        const project = projects[currentIndex];
        infoBox.innerHTML = `
            <p><strong>GitHub Repo:</strong> <a href="${project.dataset.github}" target="_blank" class="text-blue-500">${project.dataset.github}</a></p>
            <p><strong>Kezdés:</strong> ${project.dataset.start}</p>
            <p><strong>Befejezés:</strong> ${project.dataset.end}</p>
            <a href="${project.dataset.more}" target="_blank" class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">Tovább</a>
        `;
    }

    // Kép váltása a gombokkal
    function moveProject(direction) {
        // Index frissítése, ha elérjük a végére, akkor újraindul
        currentIndex = (currentIndex + direction + projects.length) % projects.length;

        // Elemek eltolása
        const offset = -currentIndex * 100; // Az aktuális elem eltolása
        container.style.transform = `translateX(${offset}%)`;  // Csúszás a projektek között
        updateProjectInfo();
    }

    updateProjectInfo(); // Az első elem betöltésekor frissítjük az információkat
</script>

