let burger = document.querySelector("#burger");
let nav = document.querySelector("#nav");
let close = document.querySelector("#close");
let logo = document.querySelector("#logoUser");
let body = document.querySelector("body");

// function close
function closeMenu() {
  if (nav.classList.contains("nav-open")) {
    nav.classList.remove("nav-open");
    nav.classList.add("left-section-index");
    close.classList.remove("square-logo");
    close.classList.add("visibility-hidden");
    logo.classList.remove("logo-user");
    logo.classList.add("visibility-hidden");
    body.classList.remove("no-scroll");
  }
}
// evenement au click pour ouvrir le menu burger
burger.addEventListener("click", () => {
  if (nav.classList.contains("left-section-index")) {
    nav.classList.remove("left-section-index");
    nav.classList.add("nav-open");
    close.classList.remove("visibility-hidden");
    close.classList.add("square-logo");
    logo.classList.remove("visibility-hidden");
    logo.classList.add("logo-user");
    body.classList.add("no-scroll");
  }
});

// evenement au click sur le bouton pour fermer le menu burger
close.addEventListener("click", () => {
  closeMenu();
});

// fermer le menu burger quand width > 768px
window.addEventListener("resize", () => {
  if (window.innerWidth > 768) {
    closeMenu();
  }
});
