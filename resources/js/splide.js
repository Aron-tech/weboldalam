import Splide from "@splidejs/splide";
import "@splidejs/splide/css";

export default function initSplide() {

    document.querySelectorAll(".splide.general").forEach((slider) => {
        const splide = new Splide(slider, {
            type: 'fade',
            rewind: true,
            pagination: true,
            arrows: false,
            height: '100%',
            autoHeight: true,
            speed: 1000,
            paginationDirection: 'ttb',
            classes: {
                pagination: 'splide__pagination vertical-pagination',
            }
        }).mount();

        const prevButton = slider.querySelector(".general-prev");
        const nextButton = slider.querySelector(".general-next");

        prevButton.addEventListener("click", () => splide.go("-1"));
        nextButton.addEventListener("click", () => splide.go("+1"));
    });

    document.querySelectorAll(".splide.content").forEach((slider) => {
        const splide = new Splide(slider, {
            type: 'slide',
            rewind: true,
            pagination: false,
            arrows: false,
            height: '100%',
            autoHeight: true,
            perPage: 3,
            gap: '1rem',
            perMove: 1,
            width: '100%',
            breakpoints: {
                1024: {
                perPage: 2,
                },
                640: {
                perPage: 1,
                }
            },
            autoplay: true,
            speed: 1000,
            interval: 5000,
            pauseOnHover: true,
        }).mount();

        const prevButton = document.querySelector(".content-prev");
        const nextButton = document.querySelector(".content-next");

        prevButton.addEventListener("click", () => splide.go("-1"));
        nextButton.addEventListener("click", () => splide.go("+1"));
    });

    document.querySelectorAll(".splide.project").forEach((slider) => {
        const splide = new Splide(slider, {
            type: 'loop',
            rewind: true,
            pagination: false,
            arrows: false,
            height: '100%',
            autoHeight: true,
            speed: 1000,
            classes: {
                pagination: 'splide__pagination vertical-pagination',
            }
        }).mount();

        const prevButton = slider.querySelector(".project-prev");
        const nextButton = slider.querySelector(".project-next");

        prevButton.addEventListener("click", () => splide.go("-1"));
        nextButton.addEventListener("click", () => splide.go("+1"));
    });
}
