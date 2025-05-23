let form = document.getElementById("signup-form");

form.addEventListener("submit", function(event) {
    event.preventDefault();

    let input_list = document.getElementsByTagName("input");

    let firstname = input_list[0].value;
    let lastname = input_list[1].value;
    let email = input_list[3].value;
    let phonenumber = input_list[4].value;
    let am = input_list[6].value;
    let password = input_list[7].value;
    let password_confirm = input_list[8].value;
    let error = false;

    let firstnameError = document.getElementById("firstnameError");
    if(hasNumbers(firstname)) {
        firstnameError.textContent = "Numbers aren't allowed";
        input_list[0].classList.add("error");
        error = true;
    }
    else {
        firstnameError.textContent = "";
        input_list[0].classList.remove("error");
    }

    let lastnameError = document.getElementById("lastnameError");
    if(hasNumbers(lastname)) {
        lastnameError.textContent = "Numbers aren't allowed";
        input_list[1].classList.add("error");
        error = true;
    }
    else {
        lastnameError.textContent = "";
        input_list[1].classList.remove("error");
    }

    let emailError = document.getElementById("emailError");
    if(!(/\.[a-z]{2,3}$/.test(email))) {
        emailError.textContent = "Invalid email";
        input_list[3].classList.add("error");
        error = true;
    }
    else {
        emailError.textContent = "";
        input_list[3].classList.remove("error");
    }

    let phonenumberError = document.getElementById("phonenumberError");
    if(!(phonenumber.length == 10)) {
        phonenumberError.textContent = "Phonenumbers can only have 10 digits";
        input_list[4].classList.add("error");
        error = true;
    }
    else {
        phonenumberError.textContent = "";
        input_list[4].classList.remove("error");
    }

    let amError = document.getElementById("amError");
    if(!(am.length == 13) && !(am.startsWith("2022"))) {
        amError.textContent = "Invalid AM format";
        input_list[6].classList.add("error");
        error = true;
    }
    else {
        amError.textContent = "";
        input_list[6].classList.remove("error");
    }

    let passwordError = document.getElementById("passwordError");
    if((password.length < 5) || (!hasSpecialCharacters(password))) {
        passwordError.textContent = "Passwords must be at least 5 characters and contain at least one special character";
        input_list[7].classList.add("error");
        error = true;
    } 
    else {
        passwordError.textContent = "";
        input_list[7].classList.remove("error");
    }

    let passwordConfirmError = document.getElementById("passwordConfirmError");
    if(password_confirm !== password) {
        passwordConfirmError.textContent = "Passwords don't match.";
        input_list[8].classList.add("error");
        error = true;
    } 
    else {
        passwordConfirmError.textContent = "";
        input_list[8].classList.remove("error");
    }

    if(!error) {
        form.reset();
        alert("Account created. You can now login!");
    }
});

function hasNumbers(str) {
    return /\d/.test(str);
}

function hasSpecialCharacters(str) {
    return /[!@#$%^&*(),.?":{}|<>]/.test(str);
}