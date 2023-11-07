"use strict";

import { onReady } from "../utils";

function fetch_posts() {

  const load_more_btn = document.querySelector(".load--more");

  if (load_more_btn === null) {
    return;
  }

  load_more_btn.addEventListener("click", function(e) {
    e.preventDefault();

    let current_page = document.querySelector('.site-main').dataset.page;
    let max_pages = document.querySelector('.site-main').dataset.max;

    
  });

}

onReady(() => {
  fetch_posts();
});