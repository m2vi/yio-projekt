// k (0 = not reverse / 1 = reverse)
// h = start int
function load(x, w, k, h, r) {
  if (x === undefined || parseInt(x) === NaN) x = 5;

  if (k === 0) {
    for (i = 1; i <= x; i++) {
      try {
        document.getElementById(w + "-tr-" + parseInt(i)).style.display =
          "table-row";
      } catch (e) {
        break;
      }
    }
  } else if (k === 1) {
    for (i = h; i >= x; i--) {
      try {
        if (i < logH && i > r) {
          document.getElementById(w + "-tr-" + parseInt(i)).style.display =
            "table-row";
        }
      } catch (e) {
        break;
      }
    }
  } else {
    console.log("Please select reverse or not reverse (0, 1)");
  }
}

window.addEventListener("load", () => {
  load(20, "submit", 0);
  load(0, "log", 1, logH, 25);
});
