"use strict";
import { onReady } from "../utils";

const torFade = () => {
  const imageContainers = document.querySelectorAll(".tor-fade");

  if (imageContainers.length > 0) {
    imageContainers.forEach((container) => {
      let slideIndex = 0;

      const carousel = () => {
        let i;
        const x = container.getElementsByClassName("tor-fade__item");
        for (i = 0; i < x.length; i++) {
          x[i].style.opacity = "0";
        }
        slideIndex++;
        if (slideIndex > x.length) {
          slideIndex = 1;
        }
        x[slideIndex - 1].style.opacity = "1";
        setTimeout(carousel, 3000); // Change image every 2 seconds
      };

      carousel();
    });
  }
};

onReady(() => {torFade();});