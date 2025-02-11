document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("images-container");
    const imagesData = JSON.parse(container.getAttribute("data-images"));

    if (!imagesData || imagesData.length === 0) {
        console.warn("Nincsenek elérhető képek!");
        return;
    }

    let currentIndex = 0;

    // Kép elem létrehozása és stílus beállítása
    const img = document.createElement("img");
    img.src = imagesData[currentIndex];
    img.className = "w-full h-full object-cover absolute transition-opacity duration-1000 opacity-100";
    img.alt = "Kép";

    container.appendChild(img);

    // Képek váltása időzítővel
    setInterval(() => {
        currentIndex = (currentIndex + 1) % imagesData.length; // Következő kép indexe

        // Új kép létrehozása és beillesztése
        const newImg = document.createElement("img");
        newImg.src = imagesData[currentIndex];
        newImg.className = "w-full h-full object-cover absolute transition-opacity duration-1000 opacity-0";
        newImg.alt = "Kép";

        container.appendChild(newImg);

        // Rövid késleltetés után az új kép átlátszatlanná válik
        setTimeout(() => {
            newImg.classList.add("opacity-100");
            img.classList.remove("opacity-100");
            img.classList.add("opacity-0");

            // Régi kép eltávolítása az átmenet után
            setTimeout(() => {
                container.removeChild(img);
                img.src = newImg.src;
            }, 1000);
        }, 100);
    }, 3000); // 3 másodpercenként vált
});
