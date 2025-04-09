//Header Drop Down menu link selector
function navigateProfile(){
    let selector = document.getElementById("profileSelect").value;
    if(selector){
        window.location.href = selector;
    }
}

//Password Show and Hide
const passwordField = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.textContent = "🙈";
    } else {
        passwordField.type = "password";
        togglePassword.textContent = "👁️"; 
    }
});
