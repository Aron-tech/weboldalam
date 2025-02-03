import './bootstrap';

const hamburgerIcon = document.getElementById('hamburger-icon');
const mobileMenu = document.getElementById('mobile-menu');

hamburgerIcon.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
        navbar.classList.add("z-10","bg-opacity-30", "backdrop-blur-md");
        mobileMenu.classList.add("z-10","bg-opacity-10", "backdrop-blur-md");
    } else {
        mobileMenu.classList.remove("z-10","bg-opacity-10", "backdrop-blur-md");
        navbar.classList.remove("z-10","bg-opacity-30", "backdrop-blur-md");
    }
});
