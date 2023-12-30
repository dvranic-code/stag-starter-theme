"use strict";
import { onReady } from "../utils";

const chooseService = () => {
  const pickedService = document.querySelector(".tor-service-choosen");

  if (pickedService) {
    const isActive = () => {
      const row = pickedService.querySelectorAll("tbody tr");
      if (0 !== row.length) {
        pickedService.classList.add("is-active");
      } else {
        pickedService.classList.remove("is-active");
      }
    };

    const itemCheck = document.querySelectorAll(".tor-service-checkbox input");
    itemCheck.forEach((item) => {
      item.addEventListener("change", () => {
        // clear existing rows
        pickedService.querySelector("tbody").innerHTML = "";
        // reset total
        let total = 0;

        // get total cell
        const totalCell = pickedService.querySelector(".tor-service-total");

        // get all checked items
        const checkedItems = document.querySelectorAll(
          ".tor-service-checkbox input:checked"
        );
        checkedItems.forEach((checkedItem, index) => {
          // get the rice from the checked item
          const price = checkedItem.closest("tr").querySelector(".tor-service-price");
          const currency = price.dataset.torCurency;
          // get the name from the checked item
          const name = checkedItem.closest("tr").querySelector(".tor-service-name");
          // clone cells
          const clonedPrice = price.cloneNode(true);
          const clonedName = name.cloneNode(true);
          // create a new row
          const clonedRow = document.createElement("tr");
          // create a new cell
          const clonedCell = document.createElement("td");
          clonedCell.innerHTML = index + 1;
          clonedCell.classList.add("has-text-align-center");
          // append the cells to the row
          clonedRow.appendChild(clonedCell);
          clonedRow.appendChild(clonedName);
          clonedRow.appendChild(clonedPrice);
          // append the cloned row to the table body
          pickedService.querySelector("tbody").appendChild(clonedRow);
          // update Total in footer
          totalCell.innerHTML = (total += parseInt(price.innerHTML)) + " " + currency;
        });
        isActive();
      });
    });

    isActive();

    // Filtering table
    const filterInput = document.querySelector(".block-services__search .search-form__search-field");

    if (filterInput) {
      filterInput.addEventListener("keyup", () => {
        const filter = filterInput.value.toUpperCase();
        const tables = document.querySelectorAll(".block-services .tor-service-table table");

        tables.forEach((table) => {
          const tr = table.querySelectorAll("tbody tr");
          for (let i = 0; i < tr.length; i++) {
            const td = tr[i].querySelectorAll("td")[1];
            if (td) {
              const txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        });
    
      });
    }
  }
};

onReady(() => {
  chooseService();
});
