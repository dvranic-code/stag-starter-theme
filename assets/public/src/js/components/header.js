"use strict";

import { debounce, onReady } from "../utils";

function showMenu() {
  const navigation = document.getElementById("main-navigation");
  const menuItems = document.querySelectorAll("#main-navigation li.children-zero-level.menu-item-has-children");
  const menuOverlay = document.getElementsByClassName(
    "site-header__nav-overlay"
  )[0];
  

  if (navigation === null || menuItems.length === 0) {
    return;
  }

  menuItems.forEach((menuItem) => {
    menuItem.addEventListener("mouseenter", function() {
      navigation.classList.add("menu-active");
      menuOverlay.classList.add("overlay-active");
      this.classList.add("active");
    });
  
    menuItem.addEventListener("mouseleave", function() {
      navigation.classList.remove("menu-active");
      menuOverlay.classList.remove("overlay-active");
      this.classList.remove("active");
    });
  });

  
  const subMenu = document.querySelectorAll('.sub-menu li.menu-item-has-children');
  
  subMenu.forEach((menuItem) => {
    menuItem.addEventListener("mouseenter", function() {
      this.classList.add("active");
    });
  
    menuItem.addEventListener("mouseleave", function() {
      this.classList.remove("active");
    });
  });

}

function getMainNavWidth() {
  const mainNavWidth = document.getElementById("mainNavWidth");
  const getWidth = mainNavWidth.offsetWidth;

  if (getWidth === null) {
    return;
  }

  document.documentElement.style.setProperty("--mainNavWidth", getWidth + "px");
}

onReady(() => {
  showMenu();
  getMainNavWidth();
});
