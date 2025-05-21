let submit = document.getElementById("_login_button");
submit.onclick = (function() {
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    if(email.value == "" || password.value == "") {
        alert("Incorrect email or password.");
    }
});