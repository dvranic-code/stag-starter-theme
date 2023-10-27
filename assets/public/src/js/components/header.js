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

function languageSwitcher() {
  const body = document.getElementsByTagName('body')[0];
  const languageIcon = document.getElementById("languageIcon");
  const lang_sub_menu = document.getElementsByClassName("lang-sub-menu")[0];

  if (!languageIcon) return;

  languageIcon.addEventListener('click', e => {
    e.stopPropagation();
    lang_sub_menu.classList.toggle('active');
  });

  body.addEventListener('click', e => {
    if (languageIcon) {
      if (!e.target.classList.contains('lang-sub-menu')) lang_sub_menu.classList.remove('active');
    }
  });
}

function triggerSearchBox() {
  const body = document.getElementsByTagName('body')[0];
  const triggerSearchBox = document.getElementById("triggerSearchBox");
  const triggerSearchBoxMobile = document.getElementById("triggerSearchBoxMobile");
  const searchPopup = document.getElementsByClassName("site-header__search-popup")[0];

  if (triggerSearchBox === null || searchPopup === null) {
    return;
  }

  function handleSearchBoxClick() {
    searchPopup.classList.toggle("active");
    body.classList.toggle("disable-scroll-search");
  }

  if (triggerSearchBox) {
    triggerSearchBox.addEventListener("click", handleSearchBoxClick);
  }

  if (triggerSearchBoxMobile) {
    triggerSearchBoxMobile.addEventListener("click", handleSearchBoxClick);
  }
}

function triggerMobileMenu() {
  const hamburger = document.getElementsByClassName("site-header__mobile-wrap--hamburger")[0];
  const mobileMenuContainer = document.querySelectorAll(".mobile-menu-container");

  if (hamburger === null) {
    return;
  }

  hamburger.addEventListener("click", function() {
    this.classList.toggle("hamburger--active");
    mobileMenuContainer.forEach((menuItem) => {
      menuItem.classList.toggle("active");
    });
  });
}

onReady(() => {
  showMenu();
  languageSwitcher();
  triggerSearchBox();
  triggerMobileMenu();

  // TODO: Remove this after fixing the font loading issue.
  setTimeout(() => {
    getMainNavWidth();
  }, 2000);
});
