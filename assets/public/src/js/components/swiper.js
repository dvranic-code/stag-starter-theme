"use strict";

import { onReady } from "../utils";

function initSwiper() {
  if (!document.querySelectorAll(".content-slider__swiper").length) return;

  const swiper = new Swiper(".content-slider__swiper", { // eslint-disable-line
    slidesPerView: 1,
    spaceBetween: 13.9,
    loop: true,
    breakpoints: {
      0: {
        slidesPerView: 1.3,
        spaceBetween: 13.9
      },
      768: {
        slidesPerView: 2.3,
        spaceBetween: 19.2
      },
      1366: {
        slidesPerView: 3,
        spaceBetween: 27.4
      }
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
}

onReady(() => {
  initSwiper();
});
