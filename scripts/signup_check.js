let form = document.getElementById("signup-form");
form.onsubmit = function(event) {
    event.preventDefault();
    
    let input_list = document.getElementsByTagName("input");

    let firstname = input_list[0].value;
    let lastname = input_list[1].value;
    let username = input_list[2].value;
    let email = input_list[3].value;
    let phonenumber = input_list[4].value;
    let university = input_list[5].value;
    let am = input_list[6].value;
    let password = input_list[7].value;
    let password_confirm = input_list[8].value;
    let birthdate = input_list[9].value;
    let sex = input_list[10].value;

    let error = document.getElementById("firstnameError");
    if(hasNumbers(firstname)) {
        error.textContent = "Numbers aren't allowed";
        input_list[0].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[0].classList.remove("error");
    }

    error = document.getElementById("lastnameError");
    if(hasNumbers(lastname)) {
        error.textContent = "Numbers aren't allowed";
        input_list[1].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[1].classList.remove("error");
    }

    error = document.getElementById("emailError");
    if(!(/\.[a-z]{2,3}$/.test(email))) {
        error.textContent = "Invalid email";
        input_list[3].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[3].classList.remove("error");
    }

    error = document.getElementById("phonenumberError");
    if(!(phonenumber.length == 10)) {
        error.textContent = "Phonenumbers can only have 10 digits";
        input_list[4].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[4].classList.remove("error");
    }

    error = document.getElementById("amError");
    if(!(am.length == 13) && !(am.startsWith("2022"))) {
        error.textContent = "Invalid AM format";
        input_list[6].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[6].classList.remove("error");
    }

    error = document.getElementById("passwordError");
    if((password.length < 5) && (!hasSpecialCharacters(password))) {
        error.textContent = "Passwords must be at least 5 charactars \nand contain at least one special character";
        input_list[7].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[7].classList.remove("error");
    }

    error = document.getElementById("passwordConfirmError");
    let error2 =  document.getElementById("passwordError");
    if(!(password_confirm === password)) {
        error2.textContent = "Passwords don't match.";
        input_list[7].classList.add("error");
        error.textContent = "Passwords don't match.";
        input_list[8].classList.add("error");
    }
    else {
        error.textContent = "";
        input_list[7].classList.remove("error");
        error.textContent = "";
        input_list[8].classList.remove("error");
    }
}

function hasNumbers(string) {
  return /\d/.test(string);
}

function hasSpecialCharacters(string) {
    return /[^a-zA-Z0-9]/.test(string);
}