"use strict";

import { onReady } from "../utils";

function fetch_posts() {
  const loadMoreBtn = document.querySelector(".load--more");

  if (loadMoreBtn === null) {
    return;
  }

  loadMoreBtn.addEventListener("click", async (e) => {
    e.preventDefault();

    let currentPage = document.querySelector(".site-main").dataset.page;
    let maxPages = document.querySelector(".site-main").dataset.max;

    const postsGridWrapper = document.getElementsByClassName("posts-grid__wrapper")[0];
    const postsGridBtnWrapper = document.getElementsByClassName("posts-grid__btn-wrapper")[0];

    const moreData = new FormData();

    moreData.append("action", "load_more_posts");
    moreData.append("currentPage", currentPage);
    moreData.append('_nonce', WP_vars.nonce); // eslint-disable-line

    const dataCall = await fetch(WP_vars.ajaxURL, { // eslint-disable-line
      method: "POST",
      body: moreData
    })
      .then((res) => {
        if (res.ok) {
          return res.json(); // Parse the JSON response
        } else {
          throw new Error(`Request failed with status: ${res.status}`);
        }
      })
      .then((data) => {
        if (data && data.data) {
          const htmlString = data.data; // Extract the HTML content from the response

          postsGridBtnWrapper.insertAdjacentHTML("beforebegin", htmlString);

          // TODO: add some data atribute to not load this if it is home page
          let getUrl = window.location;
          let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
          window.history.pushState('', '', baseUrl + '/page/' + (parseInt(document.querySelector(".site-main").dataset.page) + 1));
          
          document.querySelector(".site-main").dataset.page++;
          
          if (document.querySelector(".site-main").dataset.page == document.querySelector(".site-main").dataset.max) {
            loadMoreBtn.style.display = "none";
          }
        } else {
          console.warn('Invalid data received from the server');
        }
      })
      .catch((err) => console.warn(err));
  });
}

onReady(() => {
  fetch_posts();
});
