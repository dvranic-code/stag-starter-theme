"use strict";

import { onReady } from "../utils";

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

function toggleLanguageSwitcher(id, menuClass) {
  const body = document.getElementsByTagName('body')[0];
  const languageIcon = document.getElementById(id);
  const langSubMenu = document.getElementsByClassName(menuClass)[0];

  if (!languageIcon) return;

  languageIcon.addEventListener('click', e => {
    e.preventDefault();
    e.stopPropagation();
    langSubMenu.classList.toggle('active');
  });

  body.addEventListener('click', e => {
    if (!e.target.classList.contains(menuClass)) langSubMenu.classList.remove('active');
  });
}

function languageSwitcher() {
  toggleLanguageSwitcher("languageIcon", "lang-sub-menu");
  toggleLanguageSwitcher("languageIconMobile", "lang-sub-menu-mobile");
}

function triggerSearchBox() {
  const body = document.getElementsByTagName('body')[0];
  const triggerSearchBox = document.getElementById("triggerSearchBox");
  const triggerSearchBoxMobile = document.getElementById("triggerSearchBoxMobile");
  const searchPopup = document.getElementsByClassName("site-header__search-popup")[0];

  if (triggerSearchBox === null || searchPopup === null) {
    return;
  }

  function handleSearchBoxClick(e) {
    e.preventDefault();
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
  const body = document.getElementsByTagName('body')[0];
  const hamburger = document.getElementsByClassName("site-header__mobile-wrap--hamburger")[0];
  const mobileMobileMenu = document.getElementsByClassName("mobile-menu")[0];

  if (hamburger === null) {
    return;
  }

  const childrenZeroLevel = document.querySelectorAll('#mobile-menu-navigation li.children-zero-level.menu-item-has-children');
  const childrenFirstLevel = document.querySelectorAll('#mobile-menu-navigation li.children-first-level.menu-item-has-children');
  
  childrenZeroLevel.forEach((zeroItem) => {
    const subMenuToggle = document.createElement('span');
    subMenuToggle.classList.add('sub-menu-toggle');
    
    subMenuToggle.addEventListener('click', function () {
      this.classList.toggle('active');
      this.parentElement.classList.toggle('active');
    });
    
    zeroItem.appendChild(subMenuToggle);
  });

  childrenFirstLevel.forEach((firstLevelItem) => {
    const subMenuToggleFirstLevel = document.createElement('span');
    subMenuToggleFirstLevel.classList.add('sub-menu-level-two-toggle');
  
    subMenuToggleFirstLevel.addEventListener('click', function () {
      this.classList.toggle('menu-active');
      this.parentElement.classList.toggle('menu-active');
    });

    firstLevelItem.appendChild(subMenuToggleFirstLevel);
  });

  hamburger.addEventListener("click", function() {
    this.classList.toggle("hamburger--active");
    mobileMobileMenu.classList.toggle("active");
    body.classList.toggle("disable-scroll-search");
  });
}

onReady(() => {
  showMenu();
  languageSwitcher();
  triggerSearchBox();
  triggerMobileMenu();

  setTimeout(() => {
    getMainNavWidth();
  }, 2000);
});
