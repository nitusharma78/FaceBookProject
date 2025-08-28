function togglePassword() {
    const passwordField = document.getElementById("passwordField");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

// Add some interactive feedback
document.querySelectorAll(".form-control").forEach((input) => {
    input.addEventListener("focus", function () {
        this.style.transform = "scale(1.02)";
        this.style.transition = "transform 0.2s ease";
    });

    input.addEventListener("blur", function () {
        this.style.transform = "scale(1)";
    });
});

// function myFunction() {
//     alert("Registration successfull!");
// }

// cumment section
