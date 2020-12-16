// After fully loaded
window.addEventListener("load", () => {
  setTimeout(() => {
    if (document.querySelector(".preload") != null) {
      // Remove Preloader after the site loaded lmao
      document.querySelector(".preload").classList.add("preload-finish");
      // Make overflow Visible because the preloader has hidden
      document.querySelector("body").style.overflow = "visible";
      // Insert AOS
      AOS.init({
        offset: 180,
        delay: 100,
        duration: 800,
        anchorPlacement: "bottom-bottom",
      });
    }
  }, 270);
  // Add Attr to Body
  document.body.setAttribute("id", "top");
});
