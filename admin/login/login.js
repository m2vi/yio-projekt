// username input
const username = document.querySelector(".username");
// username error message
const usercode = document.querySelector(".user-code");
// password input
const password = document.querySelector(".password");
// password error message
const passwordcode = document.querySelector(".password-code");
// Function when you click on the submit button
document.querySelector(".submit").addEventListener("click", function () {
  // If password input is empty
  if (password.value.length === 0) {
    // Adds the error class to the password input
    password.classList.add("input-error");
    // Adds the error message to the password input
    passwordcode.innerHTML = "Password is required.";
    // If password isn't empty, but has less than 8 characters
  } else if (password.value.length < 8 && password.value.length > 0) {
    // Adds the error class to the password input
    password.classList.add("input-error");
    // Adds the error message to the password input
    passwordcode.innerHTML = "Password is too short.";
    // If password is 1234
  } else if (password.value == "1234") {
    // Adds the error class to the password input
    password.classList.add("input-error");
    // Adds the error message to the password input
    passwordcode.innerHTML = "Nice try";
    // If password is ok
  }
  // If username input is empty
  if (username.value.length === 0) {
    // Adds the error class to the username input
    username.classList.add("input-error");
    // Adds the error message to the username input
    usercode.innerHTML = "Username is required.";
    // If username input is ok
  } else if (username.value.length > 0) {
    // Removes the error class from the username input
    username.classList.remove("input-error");
    // Removes the error message from the username input
    usercode.innerHTML = "";
  }
  // If username and password is ok
  if (username.value.length < 0 && password.value.length <= 8) {
    // Submit formular
    document.querySelector(".login-form").submit();
    // Close Function
    return;
  }

  // Testing
  // usercode.innerHTML = "";
  // passwordcode.innerHTML = "";
});
