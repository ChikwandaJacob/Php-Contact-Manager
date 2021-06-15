function validateEmail(email) {
    const emailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email.value.match(emailFormat)) {
        document.sign_up_form.email.style.color = "green";
        document.getElementById('email-message').style.fontSize = '12px';
        document.getElementById('email-message').style.color = 'green';
        document.getElementById('email-message').innerHTML = 'is valid';
        return true;
    } else {
        document.sign_up_form.email.style.color = "red";
        document.getElementById('email-message').style.fontSize = '12px';
        document.getElementById('email-message').style.color = 'red';
        document.getElementById('email-message').innerHTML = 'is invalid.';
        return false;
    }
}

function validatePassword(password) {
    const passwordFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    if (password.value.match(passwordFormat)) {
        document.sign_up_form.password.style.color = "green";
        document.getElementById('password-message').style.fontSize = '12px';
        document.getElementById('password-message').style.color = 'green';
        document.getElementById('password-message').innerHTML = 'is valid';
        return true;
    } else {
        document.sign_up_form.password.style.color = "red";
        document.getElementById('password-message').style.fontSize = '12px';
        document.getElementById('password-message').style.color = 'red';
        document.getElementById('password-message').innerHTML = 'must have atleast 1 small letter, 1 big letter and be 8 characters long.';
        return false;
    }
}

function confirmPassword() {
    let password = document.sign_up_form.password.value;
    let confirm_password = document.sign_up_form.confirm_password.value;
    if (confirm_password == password) {
        document.sign_up_form.password.style.color = "green";
        document.getElementById('confirm-password-message').style.fontSize = '12px';
        document.getElementById('confirm-password-message').style.color = 'green';
        document.getElementById('confirm-password-message').innerHTML = 'matches password';
        return true;
    } else {
        document.sign_up_form.password.style.color = "red";
        document.getElementById('confirm-password-message').style.fontSize = '12px';
        document.getElementById('confirm-password-message').style.color = 'red';
        document.getElementById('confirm-password-message').innerHTML = 'does not match';
        return false;
    }
}

function validate(email, password, confirm_password){
  if(validateEmail(email) && validatePassword(password) && confirmPassword(confirm_password)){
    document.getElementById("sign_up_button").disabled = false;
    document.getElementById("sign_up_button").style.backgroundColor = '#5cb85c ';
    document.getElementById("sign_up_button").style.color = 'white';
    document.getElementById("sign_up_button").style.cursor = 'pointer';
  }else{
    document.getElementById("sign_up_button").style.backgroundColor = '#292b2c';
    document.getElementById("sign_up_button").style.color = 'black';
    document.getElementById("sign_up_button").style.cursor = 'not-allowed';
    document.getElementById("sign_up_button").disabled = true;
  }
}
