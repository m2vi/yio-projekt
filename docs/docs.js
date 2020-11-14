$(document).ready(function () {
  $("#windows").hover(
    function () {
      $(this).attr("src", "win/third.png");
    },
    function () {
      $(this).attr("src", "win/second.png");
    }
  );
});

var pf = navigator.platform;
var win = ["OS/2", "Pocket PC", "Windows", "Win16", "Win32", "WinCE"];
var android = ["Linux armv7l", "null", "Android"];
var ios = [
  "iPhone",
  "iPod",
  "iPad",
  "iPhone Simulator",
  "iPod Simulator",
  "iPad Simulator",
  "Pike v7.6 release 92",
  "Pike v7.8 release 517",
];

$("body").scrollspy({
  target: ".nav",
  offset: 50,
});

// When Documents fully loaded
$(document).ready(function () {
  checkCollapse();
});

function checkCollapse() {
  // Check if Cookie isn't 0
  if (getCookie("collapse") != 0) {
    // Check if platform is Windows
    if (win.includes(pf)) {
      // Collapse the Windows Section
      $("#windowscontent").collapse("show");
      // Check if platform is Android
    } else if (android.includes(pf)) {
      // Collapse the Android Section
      $("#androidcontent").collapse("show");
      // Check if platform is IOS
    } else if (ios.includes(pf)) {
      // Collapse the IOS Section
      $("#ioscontent").collapse("show");
    }
    //Check if Cookies are enabled
    if (navigator.cookieEnabled) {
      // Create new Date
      var CookieEx = new Date();
      // Update the var CookieEx to the Date + 10 Years
      CookieEx.setFullYear(CookieEx.getFullYear() + 10);
      // Create the Cookie that exists 10 years
      document.cookie = "collapse=0; expires=" + CookieEx.toUTCString() + ";";
    }
  }
}

function getCookie(cookieName) {
  var name = cookieName + "=";
  var allCookieArray = document.cookie.split(";");
  for (var i = 0; i < allCookieArray.length; i++) {
    var temp = allCookieArray[i].trim();
    if (temp.indexOf(name) == 0)
      return temp.substring(name.length, temp.length);
  }
}

// other stuff
$("body").attr("id", "top"),
  $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (t) {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var a = $(this.hash);
        (a = a.length ? a : $("[name=" + this.hash.slice(1) + "]")).length &&
          (t.preventDefault(),
          $("html, body").animate(
            { scrollTop: a.offset().top },
            700,
            function () {
              var t = $(a);
              if ((t.focus(), t.is(":focus"))) return !1;
              t.attr("tabindex", "-1"), t.focus();
            }
          ));
      }
    });
