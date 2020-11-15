//?   *****************
//?   *     START     *
//?   *****************

// Function after everything is loaded
$(document).ready(function () {
  PlatformInUrl();
  MakeGoogleMapsHref("adress");
  scrollFunction();
  version();
  demo();
  changeCookieBtn();
  checkLang();
  MakeGoogleMapsHref();
});

// Function whenever you scroll
$(document).on("scroll", function () {
  scrollFunction();
  checkDemo();
});

// Activate Scrollspy for the class scrollspy
$("body").scrollspy({
  target: ".scrollspy",
});

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function (event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $("html, body").animate(
          {
            scrollTop: target.offset().top,
          },
          800,
          function () {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              // Checking if the target was focused
              return false;
            } else {
              $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            }
          }
        );
      }
    }
  });

function PlatformInUrl() {
  if (
    window.location.href.indexOf(navigator.platform) <= -1 ||
    window.location.href.indexOf("TouchDevice") <= -1
  ) {
    window.location.href =
      "?platform=" + navigator.platform + "&TouchDevice=" + is_touch_device();
  }
}

function MakeGoogleMapsHref(r) {
  // * Output: https://maps.google.com/?q=Musterstraße+55,+Musterstadt,+Musterland
  // * Format: Adress, City, Country
  // Check if r isn't empty
  if (r == null) r = "adress";
  // Get Element
  let a = $("#" + r);
  // Get Elements Content
  let c = $("#adress").html();
  // Replace empty character
  c = c.replace(/\s/g, "+");
  // Build href
  const href = "https://maps.google.com/?q=" + c;
  // Changed Attribute
  a.attr("href", href);
}

function LinksFrom() {
  // Make Function only runable once
  LinksFrom = function () {};
  // REPLACE ALL LINKS IN AN FOR EACH LOOP
  $("a[href]").each(function () {
    let url = $(this).attr("href");
    let hash = "";
    let newUrl = url;
    let location = window.location.href
      // remove http
      .replace(/^(https?:|)\/\//, "")
      .split("?")[0];

    // close function if the link has some shit in it or accept it if it hasn't got shit in it
    if (
      ["#", null].includes(url) ||
      url.includes("from") ||
      !url.includes("http", "www", "./", "../")
    )
      return;
    // If URL includes an HASH
    if (url.includes("#")) {
      // get hash
      hash = "#" + url.split("#")[1];
      // select the version without hash
      url = url.split("#")[0];
    }
    // If the URL has already an Parameter
    if (url.includes("?")) {
      // If the Url has already a param do sth
      newUrl = url + "&from=" + location + hash;
    } else if (!url.includes("?")) {
      newUrl = url + "?from=" + location + hash;
    }
    // change the current attr
    $(this).attr("href", newUrl);
    // Log it
    // console.log(newUrl);
  });
  // Log that the function ran
  console.log("Changed Links.");
}

//?   ******************
//?   *     COOKIE     *
//?   ******************

// Create a Cookie
// * Format: Cookiename, Content, Expire (in years and INT)
function cCookie(n, c, e) {
  // If e is undefined, set it to 1 year
  if (e === undefined) e = 1;
  // Get the Int in E
  e = parseInt(e);
  // Make Date
  let CookieEx = new Date();
  // Calculate date() + e
  CookieEx.setFullYear(CookieEx.getFullYear() + e);
  // Convert to UTC
  CookieEx.toUTCString();
  // Create the Cookie
  document.cookie = n + "=" + c + "; expires=" + CookieEx + "; patch=/";
  // Reload the Site
  location.reload();
}

// Change the Cookie Button with the Flags of the Country
function changeCookieBtn() {
  switch (getCookie("lang")) {
    case "UK":
      $(".country").css("background", 'url("./img/flags/uk.png")');
      break;
    case "DE":
      $(".country").css("background", 'url("./img/flags/de.png")');
      break;
    case "AT":
      $(".country").css("background", 'url("./img/flags/at.png")');
      break;
    case ("IT", "it"):
      $(".country").css("background", 'url("./img/flags/it.png")');
      break;
  }
}

// A get Cookie Function from ... Stackoverflow
function getCookie(p) {
  var name = p + "=";
  var allCookieArray = document.cookie.split(";");
  for (var i = 0; i < allCookieArray.length; i++) {
    var temp = allCookieArray[i].trim();
    if (temp.indexOf(name) == 0)
      return temp.substring(name.length, temp.length);
  }
  return null;
}

// If the Cookie for the language doesn't exist, create one with the language the Navigator has
// * UK = English
// TODO: Currently AT = DE, make AT = AT
function checkLang() {
  if (getCookie("lang") == null) {
    switch (navigator.language) {
      case ("en-EN", "en"):
        cookie("UK");
        break;
      case ("de-DE", "de", "de-AT"):
        cookie("DE");
        break;
      case ("it-IT", "it"):
        cookie("IT");
        break;
      default:
        cookie("UK");
    }
  }
}

// If the Cookie "AcceptCookie" doesn't exist show the Div
if (getCookie("AcceptCookie") === null) {
  // Show Cookie Class
  $(".cookie").addClass("fade-in-up");
}

// Function on Click (Cookie Close Button)
$(".cookie-close").click(function () {
  // Add Class that makes Cookie Div hide
  $(".cookie").addClass("fade-out-down");
});

// Function on Click (Accept Cookie)
$(".cookie-accept").click(function () {
  // Create Cookie that = TRUE
  cCookie("AcceptCookie", "1", 8);
});

// Function on Click (Decline Cookie)
$(".cookie-decline").click(function () {
  // Create Cookie that = FALSE
  cCookie("AcceptCookie", "0", 8);
});

/* 
TODO | Wann muss ich das Nachfragen und was 
TODO | kann ich ohne die Meldung machen?
*/

//?   ******************
//?   *     NAVBAR     *
//?   ******************

const nav = document.getElementById("navbar");

function scrollFunction() {
  // If user scrolled 1px down
  if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
    nav.classList.add("navbar-along");
    // Remove the Class if you are at the top of the page
  } else {
    nav.classList.remove("navbar-along");
  }
}

//?   *******************
//?   *    MOBILENAV    *
//?   *******************

$(document).ready(function () {
  $("#mobile-navbar").modal({
    // blocks that clicking on the background closes the modal
    backdrop: "static",
    // Disable Keyboard (blocks ESC)
    keyboard: false,
    // Make sure that the modal is not visible at the beginning
    show: false,
  });
});

$("#mn-toggle").click(function () {
  // Toggles the Mobile Navbar (Default: Makes it visible)
  $("#mobile-navbar").modal("toggle");
  // Style the body
  $("body").css({
    // Block scrolling
    overflow: "hidden",
  });
});

// clm = C lose ModalNav
$(".clm").click(function () {
  // Style Body
  $("body").css({
    // With Scrollbars
    overflow: "visible",
  });
  // Makes the Mobile Navbar invisible
  $("#mobile-navbar").modal("hide");
});

$(".mn-expand").click(function () {
  // Toggle class rotate
  $(".mn-expand").toggleClass("rotate");
  // Expand Mobile Nav Expand
  $("#expand-down").collapse("toggle");
});

//?   ******************
//?   *    VERSIONS    *
//?   ******************

$(".target-versions").click(function () {
  // Show Version Modal
  $("#versions").modal("show");
  // Wait 100ms
  setTimeout(function () {
    // Style Body
    $("body").css({
      // Remove Scrollbars
      overflow: "hidden",
    });
  }, 100);
});

// Onclick Class (mv-close(modalversion-close))
$(".mv-close").click(function () {
  // Hide Modal
  $("#versions").modal("hide");
  // Style: Overflow Visible
  $("body").css({
    overflow: "visible",
  });
});

function version() {
  // For Loop that ends when download.length is passed
  for (var index = 0; index < download.length; index++) {
    const downloads = download[index];
    document.getElementById("version-body").innerHTML +=
      "<tr><td>" +
      downloads["version"] +
      "</td><td>" +
      downloads["release"] +
      "</td><td>" +
      downloads["platform"] +
      "<td>" +
      downloads["filename"] +
      "</td><td>" +
      "<a href=" +
      downloads["mirror"] +
      ' class="tbllink">Mirror</a> | <a href=' +
      downloads["mediafire"] +
      ' class="tbllink">Mediafire</a> </td></tr>';
  }
}

//?   ******************
//?   *      DEMO      *
//?   ******************

function demo() {
  // If Aspect Ratio is a Bootstrap Class
  if (["21:9", "16:9", "4:3", "1:1"].includes(getAspectRatio())) {
    // Splits to e.g. ["16", "9"]
    const AspectRatio = getAspectRatio().split(":");

    // Adds Class to the Class yio-demo
    $(".yio-demo").addClass(
      "embed-responsive-" + AspectRatio[0] + "by" + AspectRatio[1]
      // output: embed-responsive-16by9
    );

    return AspectRatio;
    // output: 16:9
  } else {
    return false;
  }
}

function checkDemo() {
  // Calc the space between top and the start of the demo section
  let DemoOffStart = $("#demo").offset().top - vh(1);
  // Calc the space between top and the end of the demo section
  let DemoOffEnd = $(".demo-end").offset().top - vh(1);
  // If user is in the Demo section do sth
  if (
    document.body.scrollTop >= DemoOffStart &&
    document.body.scrollTop <= DemoOffEnd
  ) {
    // Wait a bit to prevent the navbar from disappearing while scrolling
    setTimeout(function () {
      if (
        document.body.scrollTop >= DemoOffStart &&
        document.body.scrollTop <= DemoOffEnd
      ) {
        // Remove Animation Slide Down
        nav.classList.remove("slide-down");
        // Add Animation Slide Up
        nav.classList.add("slide-up");
      }
      // 0.85 seconds
    }, 850);
    // Else if you aren't in the section make the nav visible again
  } else if (nav.classList.contains("slide-up")) {
    nav.classList.remove("slide-up");
    nav.classList.add("slide-down");
  }
}

// If you hover on the Navbar Pseudo Class do sth
$(".navbar-pseudo").hover(function () {
  // If nav has the class remove it and add Slide Down
  if (nav.classList.contains("slide-up")) {
    nav.classList.remove("slide-up");
    nav.classList.add("slide-down");
  }
});

//! Only for mobile devices
$(".navbar-pseudo").click(function () {
  // -same- //? and the device has to be touch
  if (nav.classList.contains("slide-up") && is_touch_device() != false) {
    nav.classList.remove("slide-up");
    nav.classList.add("slide-down");
  }
});

//?   ******************
//?   *    DOWNLOAD    *
//?   ******************

// Device is not supportet
if ($("#nosupport").length != 0) {
  // Makes the text invisible
  $(".download-text").css({
    display: "none",
  });
  // add a margin to the top
  $("#nosupport").css({
    "margin-top": "3rem",
  });
}

//?   ******************
//?   *     FOOTER     *
//?   ******************

// If navigator clicks on this do sth
$('a[href^="#PatchNotesContent"]').click(function () {
  // Collapse Patch Notes content
  $("#PatchNotesContent").collapse("show");
});

//?   ******************
//?   *      ELSE      *
//?   ******************

function is_touch_device() {
  // Try to make a TouchEvent
  try {
    document.createEvent("TouchEvent");
    return true;
  } catch (e) {
    // If the Event gives an fat ass error do sth
    return false;
  }
}

// ? Maybe sth else, because porn is kinda boring
function cheat() {
  // edits location to sth
  window.location.href = "./docs/search-for-it?its+.mp4";
}

function dontlog() {
  // Creates a cookie that is responsible for ensuring that the user is not logged
  cCookie("dont_log", "0", 100);
}

// get Dimensions
function gcd(c, n) {
  return 0 == n ? c : gcd(n, c % n);
}
function getDimensions() {
  // Screen width and Screen Height
  return screen.width + "x" + screen.height;
}
function getAspectRatio() {
  let e = screen.width,
    t = screen.height,
    c = gcd(e, t);
  return e / c + ":" + t / c;
}

// Calculate the View Height
//* Format Parameter = % of view height
function vh(v) {
  var h = Math.max(
    document.documentElement.clientHeight,
    window.innerHeight || 0
  );
  return (v * h) / 100;
}
