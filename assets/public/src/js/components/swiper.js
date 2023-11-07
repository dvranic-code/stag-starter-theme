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
        slidesPerView: 1,
        spaceBetween: 20
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1366: {
        slidesPerView: 3,
        spaceBetween: 24
      }
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    navigation: {
      prevEl: ".swiper-pagination__swiper-button-prev",
      nextEl: ".swiper-pagination__swiper-button-next"
    }
  });
}

onReady(() => {
  initSwiper();
});
