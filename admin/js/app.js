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
  AOS.init();
});

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
      styleModal(8, "fas fa-user", "Profile", "", "#profiles");
      break;
    default:
      return;
  }
}

function styleModal(classId, icon, text, target, modal) {
  // Styles the modal with the appropriate colors
  $(".area-content").addClass("btn-" + classId);
  // Adds the appropriate icon
  $("#icon").html('<i class="' + icon + '"></i>');
  // Adds the appropriate text
  $("#text").html(text);
  // Shows the modal
  $("#area").modal("show");
  // If the variable modal exists
  if (modal) {
    // Adds to the class inner the attribute onclick (If user clicks on main modal, show submodal)
    $(".inner").attr("onclick", '$("' + modal + '").modal("show")');
    // Ends the function
    return;
  }
  // *Wait 0.5s than start function
  setTimeout(function () {
    // If the main modal is still shown, change the current location to the variable target
    $("#area").hasClass("show") && (document.location = target);
    // *
  }, 500);
}

function removeBox() {
  // Repeats the function till every button got removed
  for (i = 0; i <= 8; i++) {
    // Removes the class
    $(".area-content").removeClass("btn-" + i);
  }
  // Removes the onclick attribute
  $(".inner").removeAttr("onclick");
}

function AOSReload() {
  setTimeout(function () {
    $(".aos-init").removeClass("aos-init aos-animate");
  }, 200);
}

// When the user closes the modal, scrolling is reactivated
$("#area").on("hidden.bs.modal", function () {
  // Start function removeBox()
  removeBox();
  AOS.refresh();
  $("body").css({
    overflow: "visible",
  });
});

// Overflow hidden when main modal get's opened
$("#area").on("show.bs.modal", function () {
  $("body").css({
    overflow: "hidden",
  });
  AOSReload();
});

$(".submodal").on("hidden.bs.modal", function () {
  // If area modal is open
  $("#area").hasClass("show") // If the area modal **is** open do when closing the submodal:
    ? $("body").css({
        overflow: "hidden",
      }) //If the area modal **isn't** open do when closing the submodal:
    : $("body").css({
        overflow: "visible",
      });
});

//! This function is required because the submodal is opened directly in some cases
$(".submodal").on("show.bs.modal", function () {
  $("body").css({
    overflow: "hidden",
  });
});

// Debug only
// $("#profiles").modal("show");

// document.addEventListener(
//   "contextmenu",
//   function (e) {
//     e.preventDefault();
//   },
//   false
// );
