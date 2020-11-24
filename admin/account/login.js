document.querySelector(".toggle-hash").addEventListener("click", function () {
  if (this.innerHTML == "Hash") {
    document.querySelector(".pass").placeholder = "new hash";
    document.querySelector(".pass").name = "hash";
    this.innerHTML = "Password";
  } else if (this.innerHTML == "Password") {
    document.querySelector(".pass").placeholder = "new password";
    document.querySelector(".pass").name = "password";
    this.innerHTML = "Hash";
  }
});

document.querySelector("select").addEventListener("change", function (e) {
  console.log(e);
});
