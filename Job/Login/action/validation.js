function fNameValidate() {

    var letters = /^[A-Z][A-Za-z\s]+$/;
    var n = document.getElementById("fname");
    var val = document.getElementById("fname_val");
    if (n.value.match(letters)) {
        document.getElementById("fname_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("fname_val").innerHTML = "Please Enter Valide Data eg:John";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function mNameValidate() {

    var letters = /^[A-Z][A-Za-z\s]+$/;
    var n = document.getElementById("mname");
    var val = document.getElementById("mname_val");
    if (n.value.match(letters)) {
        document.getElementById("mname_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("mname_val").innerHTML = "Please Enter Valide Data eg:Wick";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function lNameValidate() {

    var letters = /^[A-Z][A-Za-z\s]+$/;
    var n = document.getElementById("lname");
    var val = document.getElementById("lname_val");
    if (n.value.match(letters)) {
        document.getElementById("lname_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("lname_val").innerHTML = "Please Enter Valide Data eg:Wick";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function tpValidate() {
    var numbers = /^\d{10}$/;
    var n = document.getElementById("tp");
    var val = document.getElementById("tp_val");
    if (n.value.match(numbers)) {
        document.getElementById("tp_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("tp_val").innerHTML = "Please Enter Valide Data eg:0123456789";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function mail1Validate() {

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)+$/;
    var n = document.getElementById("email");
    var val = document.getElementById("email_val");
    if (n.value.match(mailformat)) {
        document.getElementById("email_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("email_val").innerHTML = "Please Enter Valide Data eg-example@exmpl";
        return false;
    }
    val.innerHTML = "";
    return false;

}
function mail2Validate() {
    var n = document.getElementById("email");
    var n2 = document.getElementById("email2");
    var val = document.getElementById("email_val");
    if (n2.value.match(n.value)) {
        document.getElementById("email2_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("email2_val").innerHTML = "Please Enter Valide Data eg-example@exmpl";
        return false;
    }
    val.innerHTML = "";
    return false;

}
function passwordValidate() {
    var n = document.getElementById("password");
    var val = document.getElementById("pw_val");
    if (!n.value.length == 0) {
        document.getElementById("pw_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("pw_val").innerHTML = "Please Enter Valide Data";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function password2Validate() {
    var n = document.getElementById("password");
    var n2 = document.getElementById("password2");
    var val = document.getElementById("pw2_val");

    if (n2.value.match(n.value)) {
        document.getElementById("pw2_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("pw2_val").innerHTML = "Please Enter Valide Data";
        return false;
    }
    val.innerHTML = "";
    return false;
}
function adsValidate() {
    var letters = " ";
    var n = document.getElementById("home_ads");
    var val = document.getElementById("home_ads_val");
    if (!n.value.length == 0) {
        document.getElementById("home_ads_val").innerHTML = "Valid Data";
        return true;
    } else {
        document.getElementById("home_ads_val").innerHTML = "Please Enter Valide Data";
        return false;
    }
    val.innerHTML = "";
    return false;
}

//Returt Functions
function userReg() {
    return fNameValidate() && mNameValidate() && lNameValidate() && tpValidate() && mail1Validate() && mail2Validate() && passwordValidate() && password2Validate() && adsValidate();
}
function login() {
    return mail1Validate() && passwordValidate();
}
