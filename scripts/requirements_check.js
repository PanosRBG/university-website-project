let form = document.getElementById("eligibility-form");
form.onsubmit = function(event) {
    event.preventDefault();
    
    // Extract the information from the HTML form
    let input_list = form.getElementsByTagName("input");
    let year = input_list[0].value;
    let courses = input_list[1].value;
    let score = input_list[2].value;
    let english = input_list[3].value;

    // Conditions for the elibility of the user based on their inputs
    if((year == "1st Year") || (courses < 70) || (score < 6.5)) {
        if((english == "A1") || (english == "A2") || (english == "B1")) {
            alert("You are not eligible to participate in the Erasmus program.");
        }
    } else {
        alert("You are eligible to join the Erasmus program.");
    }
}