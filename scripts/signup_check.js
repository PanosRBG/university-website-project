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

    if(hasNumbers(firstname)) {
        input_list[0].style.borderColor = "red";
        input_list[0].style.borderWidth = "2px";
    }
    else {
        input_list[0].style.border = null;
    }

    if(hasNumbers(lastname)) {
        input_list[1].style.borderColor = "red";
        input_list[1].style.borderWidth = "2px";
    }
    else {
        input_list[1].style.border = null;
    }

    if(!(/\.[a-z]{2,3}$/.test(email))) {
        input_list[3].style.borderColor = "red";
        input_list[3].style.borderWidth = "2px";
    }
    else {
        input_list[3].style.border = "";    
    }

    if(!(phonenumber.length == 10)) {
        input_list[4].style.borderColor = "red";
        input_list[4].style.borderWidth = "2px";
    }
    else {
        input_list[4].style.border = "";
    }

    if(!(am.length == 13) && !(am.startsWith("2022"))) {
        input_list[6].style.borderColor = "red";
        input_list[6].style.borderWidth = "2px"
    }
    else {
        input_list[6].style.border = "";
    }

    if((password.length < 5) && (!hasSpecialCharacters(password))) {
        input_list[7].style.borderColor = "red";
        input_list[7].style.borderWidth = "2px";
    }
    else {
        input_list[7].style.border = ""; 
    }

    if(!(password_confirm === password)) {
        input_list[7].style.borderColor = "red";
        input_list[7].style.borderWidth = "2px";
        input_list[8].style.borderColor = "red";
        input_list[8].style.borderWidth = "2px";
    }
    else {
        input_list[7].style.border = ""; 
        input_list[8].style.border = ""; 
    }
}

function hasNumbers(string) {
  return /\d/.test(string);
}

function hasSpecialCharacters(string) {
    return /[^a-zA-Z0-9]/.test(string);
}