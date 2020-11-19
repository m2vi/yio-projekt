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

function takePhoto(id, action) {
  console.log(id);

  const rid = id;
  const name = "ID-" + id;
  id = "#take-photo-" + id;

  if (action == 1) {
    html2canvas(document.querySelector(id)).then(function (canvas) {
      console.log(
        canvas.toDataURL("image/png")
        // .replace("image/jpeg", "image/octet-stream")
      );

      document.getElementById("image-" + rid).setAttribute(
        "value",
        canvas.toDataURL("image/png")
        // .replace("image/jpeg", "image/octet-stream")
      );
      setTimeout(function () {
        document.getElementById("hiddenform-" + rid).submit();
      }, 4000);
    });
  } else if (action == 0) {
    html2canvas(document.querySelector(id)).then(function (canvas) {
      var a = document.createElement("a");
      // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
      a.href = canvas
        .toDataURL("image/jpeg")
        .replace("image/jpeg", "image/octet-stream");
      a.download = name + ".png";
      a.click();
    });
  }
}

function scrollToAdmin() {
  $("#admin").scrollTo(500);
}

$(".btn").click(function () {});
