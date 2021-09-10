/* ---------------------------- SignUp Validtion ---------------------------- */

function validateSignUp() {
  const ERROR = document.getElementsByClassName("error-msg");
  const name = signup.name;
  const email = signup.email;
  const department = signup.department;
  const number = signup.number;
  const marks12 = signup.marks12;
  const degreeMarks = signup.degreeMarks;
  const username = signup.username;
  const pass = signup.password;

  if (name.value === "" || name.validity.patternMismatch) {
    ERROR[0].style.display = "inline-block";
    return false;
  } else ERROR[0].style.display = "none";
  if (email.value === "" || email.validity.patternMismatch) {
    ERROR[1].style.display = "inline-block";
    return false;
  } else ERROR[1].style.display = "none";
  if (department.value === "") {
    ERROR[2].style.display = "inline-block";
    return false;
  } else ERROR[2].style.display = "none";
  if (number.value === "" || number.validity.patternMismatch) {
    ERROR[3].style.display = "inline-block";
    return false;
  } else ERROR[3].style.display = "none";
  if (marks12.value === "" || marks12.validity.patternMismatch) {
    ERROR[4].style.display = "inline-block";
    return false;
  } else ERROR[4].style.display = "none";
  if (degreeMarks.value === "" || degreeMarks.validity.patternMismatch) {
    ERROR[5].style.display = "inline-block";
    return false;
  } else ERROR[5].style.display = "none";
  if (username.value === "" || username.validity.patternMismatch) {
    ERROR[6].style.display = "inline-block";
    return false;
  } else ERROR[6].style.display = "none";
  if (pass.value === "" || pass.validity.patternMismatch) {
    ERROR[7].style.display = "inline-block";
    return false;
  } else ERROR[7].style.display = "none";

  return true;
}

/* ---------------------------- Login Validation ---------------------------- */

function validateLogin() {
  const ERROR = document.getElementsByClassName("error-msg");
  const email = signup.email;
  const pass = signup.password;
  if (email.value === "" || email.validity.patternMismatch) {
    ERROR[0].style.display = "inline-block";
    return;
  } else ERROR[0].style.display = "none";
  if (pass.value === "") {
    ERROR[1].style.display = "inline-block";
    return;
  } else ERROR[1].style.display = "none";
  setData("login");
}
