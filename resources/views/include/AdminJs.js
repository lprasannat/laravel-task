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
