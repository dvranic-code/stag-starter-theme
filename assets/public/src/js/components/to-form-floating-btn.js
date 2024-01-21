/* global WP_vars */
"use strict";
import { onReady } from "../utils";

const toFormFloatingBtn = () => {
  const form = document.querySelector(".gform_wrapper");

  console.log(WP_vars.toContactForm);

  if (form) {
    const btn = document.createElement("button");
    btn.classList.add("btn", "to-form-floating-btn");
    btn.style.position = "fixed";
    btn.style.bottom = "0";
    btn.style.right = "0";
    btn.innerHTML = WP_vars.toContactForm;
    btn.addEventListener("click", () => {
      window.scrollTo({
        top: form.offsetTop - 120,
        behavior: "smooth"
      });
    });

    document.body.appendChild(btn);
  } 
};

onReady(() => {toFormFloatingBtn();});