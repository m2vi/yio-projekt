// const add = document.querySelector(".add");
// const edit = document.querySelector(".edit");
// const pass = document.getElementById("password");

const add = $(".add");
const edit = $(".edit");
const pass = $(".pass");

$(document).ready(function () {
  add.css("display", "block");
  edit.css("display", "none");
});

$(".toggle-hash").click(function () {
  if ($(this).html() === "Hash") {
    pass.attr("placeholder", "hash");
    pass.attr("name", "hash");
    $(".toggle-hash").html("Password");
  } else if ($(this).html() === "Password") {
    pass.attr("placeholder", "password");
    pass.attr("name", "password");
    $(".toggle-hash").html("Hash");
  }
});

$(".toggle-other").click(function () {
  if (add.css("display") == "none" && edit.css("display") == "block") {
    add.css("display", "block");
    edit.css("display", "none");
  } else if (add.css("display") == "block" && edit.css("display") == "none") {
    add.css("display", "none");
    edit.css("display", "block");
  }
});
