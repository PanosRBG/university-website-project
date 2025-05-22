function signupCheck() {
    let form = document.getElementById("signup-form");
    form.addEventListener("submit", function(event) {
        event.defaultPrevented();
    })
    
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

    if(hasNumber(firstname) || hasNumber(lastname)) {
        alert("Names Error");
    }

    if((!email.endsWith(".com")) && (!email.endsWith(".gr"))) {
        alert("Email Error");
    }

    if((password.length < 5) && (!hasSpecialCharacters(password))) {
        alert("Password Error");
    }

    if(!(password_confirm === password)) {
        alert("Password Confirmation Error");
    }
}

function hasNumber(string) {
  return /\d/.test(string);
}

function hasSpecialCharacters(string) {
    return /[^a-zA-Z0-9]/.test(string);
}