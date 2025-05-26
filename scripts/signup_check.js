let form = document.getElementById("signup-form");

if(form == null) {
    form = document.getElementById("user-info");
}

form.addEventListener("submit", function(event) {
    // Extract all the user input from the HTML elements
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let phonenumber = document.getElementById("phonenumber");
    let am = document.getElementById("am");
    let password = document.getElementById("password");
    let password_confirm = document.getElementById("confirm_password");
    let error = false;

    // Conditional operations to check for info validation inserted by the user
    let firstnameError = document.getElementById("firstnameError");
    if(hasNumbers(firstname.value)) {
        firstnameError.textContent = "Numbers aren't allowed";
        firstname.classList.add("error");
        error = true;
    }
    else {
        firstnameError.textContent = "";
        firstname.classList.remove("error");
    }

    let lastnameError = document.getElementById("lastnameError");
    if(hasNumbers(lastname.value)) {
        lastnameError.textContent = "Numbers aren't allowed";
        lastname.classList.add("error");
        error = true;
    }
    else {
        lastnameError.textContent = "";
        lastname.classList.remove("error");
    }

    let emailError = document.getElementById("emailError");
    if(!(/\.[a-z]{2,3}$/.test(email.value))) {
        emailError.textContent = "Invalid email";
        email.classList.add("error");
        error = true;
    }
    else {
        emailError.textContent = "";
        email.classList.remove("error");
    }

    let phonenumberError = document.getElementById("phonenumberError");
    if(!(phonenumber.value.length == 10)) {
        phonenumberError.textContent = "Phonenumbers can only have 10 digits";
        phonenumber.classList.add("error");
        error = true;
    }
    else {
        phonenumberError.textContent = "";
        phonenumber.classList.remove("error");
    }

    let amError = document.getElementById("amError");
    if(!(am.value.length == 13) || !(am.value.startsWith("2022"))) {
        amError.textContent = "Invalid AM format";
        am.classList.add("error");
        error = true;
    }
    else {
        amError.textContent = "";
        am.classList.remove("error");
    }

    let passwordError = document.getElementById("passwordError");
    if((password.value.length < 5) || (!hasSpecialCharacters(password.value))) {
        passwordError.textContent = "Passwords must be at least 5 characters and contain at least one special character";
        password.classList.add("error");
        error = true;
    } 
    else {
        passwordError.textContent = "";
        password.classList.remove("error");
    }

    let passwordConfirmError = document.getElementById("passwordConfirmError");
    if(password_confirm.value !== password.value) {
        passwordConfirmError.textContent = "Passwords don't match.";
        password_confirm.classList.add("error");
        error = true;
    } 
    else {
        passwordConfirmError.textContent = "";
        password_confirm.classList.remove("error");
    }

    // Blocks the POST message if there are errors
    if(error)
        event.preventDefault();
});

// Check for digits inside a string
function hasNumbers(str) {
    return /\d/.test(str);
}

// Check for special characters inside a string
function hasSpecialCharacters(str) {
    return /[!@#$%^&*,.?]/.test(str);
}