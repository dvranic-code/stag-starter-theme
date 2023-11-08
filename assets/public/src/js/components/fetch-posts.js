"use strict";

import { onReady } from "../utils";

function fetch_posts() {

  const loadMoreBtn = document.querySelector(".load--more");

  if (loadMoreBtn === null) {
    return;
  }

  loadMoreBtn.addEventListener("click", function(e) {
    e.preventDefault();

    let currentPage = document.querySelector('.site-main').dataset.page;
    let maxPages = document.querySelector('.site-main').dataset.max;
    
  });

}

onReady(() => {
  fetch_posts();
});
