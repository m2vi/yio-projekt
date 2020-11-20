// k (0 = not reverse / 1 = reverse)
// h = start int
function load(x, w, k, h, r) {
  if (x === undefined || parseInt(x) == isNaN()) x = 5;

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

window.addEventListener("load", function () {
  load(20, "submit", 0);
  load(0, "log", 1, logH, 25);
});

function takePhoto(id, action) {
  console.log(id);

  var rid = id;
  var name = "ID-" + id;
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

function openModal(x) {
  switch (x) {
    case 1:
      styleModal(1, "fas fa-envelope", "Mails", "", "#mails");
      break;
    case 2:
      styleModal(2, "fas fa-list-alt", "Logs", "?target=logs", "#logs");
      break;
    case 3:
      styleModal(3, "fas fa-chart-line", "Statistik", "?target=statistic");
      break;
    case 4:
      styleModal(4, "fas fa-crosshairs", "Ziele", "?target=aim");
      break;

    case 5:
      styleModal(
        5,
        "fab fa-github",
        "Git Repository",
        "https://github.com/iuvoJS/yio-projekt"
      );
      break;
    case 6:
      styleModal(
        6,
        "fas fa-file-code",
        "Source Code",
        "?target=sourcecode",
        "#sourcecode"
      );
      break;
    case 7:
      styleModal(
        7,
        "fas fa-database",
        "Datenbank",
        "http://localhost/phpmyadmin/"
      );
      break;
    case 8:
      styleModal(8, "fas fa-list-alt", "Logs");
      break;
    default:
      return;
  }
}

function styleModal(classId, icon, text, target, modal) {
  $(".area-content").addClass("btn-" + classId);
  $("#icon").html('<i class="' + icon + '"></i>');
  $("#text").html(text);
  $("#area").modal("show");
  if (modal) {
    $(".inner").attr("onclick", '$("' + modal + '").modal("show")');
    return;
  }
  setTimeout(function () {
    if ($("#area").hasClass("show")) {
      document.location = target;
    }
  }, 500);
}

function removeBox() {
  const classes = [
    "btn-1",
    "btn-2",
    "btn-3",
    "btn-4",
    "btn-5",
    "btn-6",
    "btn-7",
    "btn-8",
  ];

  for (i = 0; i <= 8; i++) {
    $(".area-content").removeClass(classes[i]);
  }

  $(".inner").removeAttr("onclick");
}

$("#area").on("hidden.bs.modal", function () {
  removeBox();
  $("body").css({
    overflow: "visible",
  });
});
$(".submodal").on("hidden.bs.modal", function () {
  $("body").css({
    overflow: "hidden",
  });
});
