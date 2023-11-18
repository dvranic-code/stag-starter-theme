"use strict";

import { onReady } from "../utils";

function initContentSwiper() {
  if (!document.querySelectorAll(".content-slider__swiper").length) return;

  const content_swiper = new Swiper(".content-slider__swiper", { // eslint-disable-line
    slidesPerView: 1,
    spaceBetween: 13.9,
    loop: false,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      520: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1024: {
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

function initTimelineSwiper() {
  if (!document.querySelectorAll(".timeline-slider__swiper").length) return;

  const timline_swiper = new Swiper(".timeline-slider__swiper", { // eslint-disable-line
    slidesPerView: 5,
    loop: false,
    breakpoints: {
      0: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 3
      },
      1024: {
        slidesPerView: 5
      }
    },
    navigation: {
      prevEl: ".swiper-pagination__swiper-button-prev",
      nextEl: ".swiper-pagination__swiper-button-next"
    }
  });
}

function calcTimelineSwiperHeight() {
  const slides = document.querySelectorAll('.timeline-slider__slide');

  if (!slides.length) return;

  let maxHeight = 0;

  slides.forEach(function( slide ) {
    const timestamp = slide.querySelector('.timeline-slider__timestamp');
    const content = slide.querySelector('.timeline-slider__content');

    let timestampHeight = timestamp.offsetHeight;
    let contentHeight = content.offsetHeight;

    maxHeight = Math.max(maxHeight, timestampHeight, contentHeight);
  });

  slides.forEach(function( slide ) {
    const timestamp = slide.querySelector('.timeline-slider__timestamp');
    const content = slide.querySelector('.timeline-slider__content');
    timestamp.style.height = maxHeight + 'px';
    content.style.height = maxHeight + 'px';
  });
}

onReady(() => {
  initContentSwiper();
  initTimelineSwiper();
  calcTimelineSwiperHeight();
});
