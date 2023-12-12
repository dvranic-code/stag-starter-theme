"use strict";

import { onReady } from "../utils";

function imgPopup() {
  const cards = document.querySelectorAll(".certificate-block__grid--card");
  cards.forEach(function (card) {
    card.addEventListener("click", function (e) {
      e.preventDefault();
      let popup = document.createElement("div");
      popup.style.position = "fixed";
      popup.style.top = "0";
      popup.style.left = "0";
      popup.style.width = "100%";
      popup.style.height = "100%";
      popup.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
      popup.style.display = "flex";
      popup.style.justifyContent = "center";
      popup.style.alignItems = "center";
      popup.style.zIndex = "1000";

      let img = document.createElement("img");
      img.src = this.getAttribute("data-img-url"); // get the image URL from the data attribute
      img.style.maxWidth = "90%";
      img.style.maxHeight = "90%";

      popup.appendChild(img);
      document.body.appendChild(popup);
      document.body.style.overflow = "hidden"; // Prevent scrolling

      popup.addEventListener("click", function () {
        document.body.removeChild(popup);
        document.body.style.overflow = "auto"; // Enable scrolling again
      });
    });
  });
}

onReady(() => {
  imgPopup();
});
