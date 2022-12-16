const togglePassword = document.querySelectorAll(".eye");
let activeClassName = "is-active";
togglePassword.forEach((item) => {
  item.addEventListener("click", handleTogglePassword);
});
function handleTogglePassword() {
  let inputType = "password";
 const input = this.parentNode?.previousElementSibling;
  console.log(input);
  if (this.matches(".eye-close")) {
    inputType = "text";
    const eyeOpen = this.previousElementSibling;
    eyeOpen && eyeOpen.classList.add(activeClassName);
  } else {
    inputType = "password";
    this.classList.remove(activeClassName);
  }
  input && input.setAttribute("type", inputType);
}
