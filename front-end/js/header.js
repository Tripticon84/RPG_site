/* Dropdown menu */

/* Quand l'utilisateur clique sur le bouton, 
change entre cacher et montrer le contenu du dropdown */
function dropdown() {
  console.log("dropdown");
  document.getElementById("dropdownHeader").classList.toggle("show");
}

// Ferme le dropdown si l'utilisateur clique en dehors
window.onclick = function (event) {
  if (
    !event.target.matches(".dropdown") &&
    !event.target.closest(".dropdown-menu")
  ) {
    let dropdowns = document.getElementsByClassName("dropdown-menu");
    let i;
    for (i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

/* Collapse menu */

function topnavExpand() {
    let x = document.getElementById("topNav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }