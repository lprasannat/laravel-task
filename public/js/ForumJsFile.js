function validateFirstName(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('please enter first name');
    }
    /*else if (textbox.validity.typeMismatch){
     textbox.setCustomValidity('please enter a valid email address');
     }*/
    else {
        textbox.setCustomValidity('');
    }
    return true;
}
function validateLastName(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('please enter last name');
    }
    /*else if (textbox.validity.typeMismatch){
     textbox.setCustomValidity('please enter a valid email address');
     }*/
    else {
        textbox.setCustomValidity('');
    }
    return true;
}

function validateEmail(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('Required email address');
    } else if (textbox.validity.typeMismatch) {
        textbox.setCustomValidity('please enter a valid email address');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}
function validatePassword(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('please enter password');
    } else if ((textbox.value.length) < 8) {
        textbox.setCustomValidity('please enter a valid password');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}
function validateConfirmPassword(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('please enter password');
    } else if ((textbox.value.length) < 8) {
        textbox.setCustomValidity('please enter a valid password');
    }  else {
        textbox.setCustomValidity('');
    }
    return true;
}

function validateMobileNumber(textbox) {
    if (textbox.value == '') {
        textbox.setCustomValidity('please enter mobilenumber');
    } else if (isNaN(textbox.value))
    {
        textbox.setCustomValidity('please enter only digits');
    } else if ((textbox.value.length) != 10) {
        textbox.setCustomValidity('please enter a valid mobile number');
    } else {
        textbox.setCustomValidity('');
    }
    return true;
}

