"use strict";

import { onReady } from "../utils";

function imgPopup(className) {
  const cards = document.querySelectorAll(`.${className}`);
  cards.forEach(function (card) {
    card.addEventListener("click", function (e) {
      e.preventDefault();
      showPopup(this, 'image');
    });
  });
}

function showNewsPopup(className) {
  const news = document.querySelector(`.${className}`);
  if (!news) return;

  // After 3 seconds, show news popup
  setTimeout(() => {
    showPopup(news, 'popup');
    // Set cookie to prevent showing popup again
    document.cookie = "stagShowPopup=false; max-age=3600"; // 1 hour
  }, 3000);
} 

export const showPopup = (element, type=null) => {
  // Check if popup should be shown
  if (type === 'popup' && document.cookie.includes("stagShowPopup=false")) return;

  let popup = document.createElement("div");
  popup.style.position = "fixed";
  popup.style.top = "0";
  popup.style.left = "0";
  popup.style.width = "100%";
  popup.style.height = "100%";
  popup.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  popup.style.display = "flex";
  popup.style.justifyContent = "center";
  popup.style.alignItems = "center";
  popup.style.zIndex = "1000";
  popup.classList.add("img-popup");

  let child = document.createElement("div");
  child.classList.add("img-popup__child");
  child.style.position = "relative";
  child.style.maxWidth = "90dvw";
  child.style.maxHeight = "90dvh";

  if (type === "image") {
    let img = document.createElement("img");
    img.src = element.getAttribute("data-img-url"); // get the image URL from the data attribute
    child.appendChild(img);
  } else if (type === "popup") {
    let container = element.cloneNode(true);
    container.style.display = "block";
    child.appendChild(container);
  } else {
    // put element as child of popup
    let container = element.cloneNode(true);
    child.appendChild(container);
  }

  // Add "Close" button
  let close = document.createElement("div");
  close.classList.add("img-popup__close");
  close.textContent = "X";

  child.appendChild(close);

  popup.appendChild(child);
  document.body.appendChild(popup);
  document.body.style.overflow = "hidden"; // Prevent scrolling

  popup.addEventListener("click", function () {
    document.body.removeChild(popup);
    document.body.style.overflow = "auto"; // Enable scrolling again
  });
};

onReady(() => {
  imgPopup('certificate-block__grid--card');
  showNewsPopup('popup__wrapper');
});
