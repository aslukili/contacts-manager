const form = document.getElementById("form");
const fullName = document.getElementById('fullName');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');
const passwordConfirm = document.getElementById('passwordConfirm');
let isValid = true;

const isValidEmail = email => {
    const regemail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const isValidPhone = phone => {
    const re = /(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}/g;
    return re.test(String(phone).toLowerCase());
}

form.addEventListener("submit", e => {
    validateInputs()
    if (!isValid){
        e.preventDefault();
    }
});

const validateInputs = () => {
    //former variable + Value = former variable + trim();
    const fullNameValue = fullName.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();
    const passwordValue = password.value.trim();
    const passwordConfirmValue = passwordConfirm.value.trim();

    // checking the full name
    if (fullNameValue === ''){
        setError(fullName, 'please provide your full name');
        isValid = false;
    } else {
        setSuccess(fullName);
        isValid = true;
    }
    //checking the email
    if(emailValue === '') {
        setError(email, 'Email is required');
        isValid = false
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        isValid = false
    } else {
        setSuccess(email);
        isValid = true;
    }
    //checking the phone number
    if(phoneValue === '') {
        setError(phone, 'Phone number is required');
        isValid = false
    } else if (!isValidPhone(phoneValue)) {
        setError(phone, 'Provide a valid phone number');
        isValid = false
    } else {
        setSuccess(phone);
        isValid = true;
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
        isValid = false
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
        isValid = false
    } else {
        setSuccess(password);
        isValid = true;
    }

    if(passwordConfirmValue === '') {
        setError(passwordConfirm, 'Please confirm your password');
        isValid = false
    } else if (passwordConfirmValue !== passwordValue) {
        setError(passwordConfirm, "Passwords doesn't match");
        isValid = false
    } else {
        setSuccess(passwordConfirm);
        isValid = true;
    }
}

function setError(element, message){
    const inputControl = element.parentElement;//parent of the field that has an invalid value
    const errorDisplay = inputControl.querySelector(".error"); //the empty div which was made to show error messages
    errorDisplay.innerText = message;
    //we remove success class and add error class if the first present
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

function setSuccess(element){
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}