/* 

1. Add your custom JavaScript code below
2. Place the this code in your template:

  

*/

const slideImgContainer = document.querySelectorAll(".slide-img-container");

slideImgContainer.forEach((el, i) => {
    el.style.opacity = 0;
});

let swiper = new Swiper(".swiper", {
    // Optional parameters
    // direction: 'vertical',
    loop: true,
    pauseOnMouseEnter: false,
    autoplay: {
        // delay: 5000,
        delay: 13000,
    },
    effect: "fade",
    speed: 1000,
    fadeEffect: {
        crossFade: true,
    },
    draggable: false,
    allowTouchMove: false,
});

function changeSlides() {
    gsap.set(swiper.slides[swiper.activeIndex].querySelector(".slide-img-container"), { opacity: 0, scale: 1.2 });

    let prev = swiper.slides[swiper.previousIndex].querySelector(".slide-img-container");

    let tl = gsap.timeline();

    tl.to(
        swiper.slides[swiper.activeIndex].querySelector(".slide-img-container"),
        {
            opacity: 1,
            scale: 1,
            duration: 3,

            onUpdate: () => {
                gsap.set(swiper.slides[swiper.previousIndex].querySelector(".slide-img-container"), { duration: 0.1, opacity: 0, scale: 1.2 });
            },
        },
        0.1
    );

    tl.to(swiper.slides[swiper.activeIndex].querySelector(".slide-img-container"), {
        delay: 10,
        opacity: 0,
        scale: 1,
        duration: 1,
    });

    tl.restart();
}

window.onload = () => {
    let tl = gsap.timeline();

    tl.to(
        swiper.slides[swiper.activeIndex].querySelector(".slide-img-container"),
        {
            opacity: 1,
            scale: 1,
            duration: 3,
        },
        0.1
    );

    tl.to(swiper.slides[swiper.activeIndex].querySelector(".slide-img-container"), {
        delay: 1,
        opacity: 0,
        scale: 1,
        duration: 1,
    });
    swiper.on("slideChange", function () {
        changeSlides();
    });
};
