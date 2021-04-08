var form = document.querySelector("form");
var emailField = form.email;//>>>.email correspond à l'attribut name dans le html 
var emailValid = false;
// console.log(emailField);

emailField.addEventListener("change", validateEmail);

function validateEmail(){
    // console.log(emailField.value);
    var emailPattern = /^[a-zA-Z0-9.\-_]+[@]{1}[a-zA-Z]+[.]{1}[a-z]{2,6}$/;
    emailValid = emailPattern.test(emailField.value); // ici on dit que l'email sera true si la condition suivante est remplie

    console.log(emailValid);
    var msg = "";
    if(emailValid){
        msg = "votre email est valide";
    }else{
        msg = "votre email n'est pas valide";
    }
    displayInfo(emailValid, emailField, msg);
}
