document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signup-form");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const errorMessage = document.createElement("span");

    errorMessage.style.color = "red";
    confirmPassword.parentNode.appendChild(errorMessage);

    form.addEventListener("submit", function(event) {
        
        errorMessage.innerHTML = "";

     
        if (password.value !== confirmPassword.value) {
           
            errorMessage.innerHTML = "Passwords does not match!";
            event.preventDefault();
        }
    });
});
