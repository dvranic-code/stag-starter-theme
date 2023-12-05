"use strict";

import { onReady } from "../utils";

function fetch_posts() {
  const loadMoreBtn = document.querySelector(".load--more");

  if (loadMoreBtn === null) {
    return;
  }

  let postsGrid = document.querySelector(".posts-grid");

  if ( postsGrid ) {
    if (document.querySelector(".posts-grid").dataset.page == document.querySelector(".posts-grid").dataset.max) {
      loadMoreBtn.style.display = "none";
    }
  } else {
    if (document.querySelector(".site-main").dataset.page == document.querySelector(".site-main").dataset.max) {
      loadMoreBtn.style.display = "none";
    }
  }

  loadMoreBtn.addEventListener("click", async (e) => {
    e.preventDefault();

    let currentPage = '';

    let postsGrid = document.querySelector(".posts-grid");

    if ( postsGrid ) {
      currentPage = document.querySelector(".posts-grid").dataset.page;
    } else {
      currentPage = document.querySelector(".site-main").dataset.page;
    }

    let postType = '';
    let numberOfPosts = '';

    if ( postsGrid ) {
      postType = document.querySelector(".posts-grid").dataset.post;
      numberOfPosts = document.querySelector(".posts-grid").dataset.number;
    }
    
    let maxPages = document.querySelector(".site-main").dataset.max;
    let isSearch = document.querySelector(".site-main").dataset.search === "is-search";

    let searchField = document.querySelector(".search-form__search-field");

    let searchQuery = '';

    if ( searchField ) {
      searchQuery = searchField.value;
    }

    let isBlock = postsGrid ? postsGrid.dataset.block === "is-block" : false;

    const postsGridWrapper = document.getElementsByClassName("posts-grid__wrapper")[0];
    const postsGridBtnWrapper = document.getElementsByClassName("posts-grid__btn-wrapper")[0];

    const moreData = new FormData();

    moreData.append("action", "load_more_posts");
    moreData.append("currentPage", currentPage);
    moreData.append("searchQuery", searchQuery);
    moreData.append("postType", postType);
    moreData.append("numberOfPosts", numberOfPosts);
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
          const htmlString = data.data[0]; // Extract the HTML content from the response

          // const maxPages = data.data[1]; // Extract the max pages from the response for search

          postsGridBtnWrapper.insertAdjacentHTML("beforebegin", htmlString);

          if ( ! isSearch && ! isBlock ) {
            let getUrl = window.location;
            let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            window.history.pushState('', '', baseUrl + '/page/' + (parseInt(document.querySelector(".site-main").dataset.page) + 1));
          }

          document.querySelector(".site-main").dataset.page++;

          
          if (document.querySelector(".site-main").dataset.page == document.querySelector(".site-main").dataset.max) {
            loadMoreBtn.style.display = "none";
          }
          
          if ( isBlock ) {
            document.querySelector(".posts-grid").dataset.page++;

            if (document.querySelector(".posts-grid").dataset.page == document.querySelector(".posts-grid").dataset.max) {
              loadMoreBtn.style.display = "none";
            }
          }

          // if ( isSearch ) {
          //   if ( document.querySelector(".site-main").dataset.page == maxPages ) {
          //     loadMoreBtn.style.display = "none";
          //   }
          // }
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
