const username = document.getElementById('username');
const pass = document.getElementById('password');
const verPass = document.getElementById('ver_password');


let isValidSignup = false,
    isValidLogin = false;

const isValidUsername = username => {
    const re = /^[a-z0-9_-]{3,15}$/gm;
    return re.test(String(username).toLowerCase());
}

const isValidPass = pass => {
    const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    return re.test(String(pass).toLowerCase());
}

const validateSignup = () => {
    //former variable + Value = former variable + trim();
    const usernameValue = username.value.trim();
    const passwordValue = pass.value.trim();
    const passwordConfirmValue = verPass.value.trim();

    let isUser = false,
        isPass = false,
        isVerPss = false;
    // checking the full name
    if (usernameValue === ''){
        setError(username, 'please choose a username');
    }
    else if(!isValidUsername(usernameValue)) {
        setError(username, 'please enter a valid username');
    }else {
        setSuccess(username);
        isUser = true;
    }


    if(passwordValue === '') {
        setError(pass, 'Password is required');
    } else if (!isValidPass(passwordValue)) {
        setError(pass, 'Password must be at least 6 character and contains 1 number.')
    } else {
        setSuccess(pass);
        isPass = true;
    }

    if(passwordConfirmValue === '') {
        setError(verPass, 'Please confirm your password');
    } else if (passwordConfirmValue !== passwordValue) {
        setError(verPass, "Password doesn't match");
    } else {
        setSuccess(verPass);
        isVerPss = true;
    }

    if(isUser && isPass && isVerPss){
        isValidSignup = true;
    }

    return isValidSignup;
}

const validateLogin = () => {
    //former variable + Value = former variable + trim();
    const usernameValue = username.value.trim();
    const passwordValue = pass.value.trim();

    let isUserLogin = false,
        isPassLogin = false;
    // checking username
    if (usernameValue === ''){
        setError(username, 'enter your username');
    }
    else if(!isValidUsername(usernameValue)) {
        setError(username, 'please enter a valid username');
    }else {
        setSuccess(username);
        isUserLogin = true;
    }


    if(passwordValue === '') {
        setError(pass, 'Password is required');
    } else if (!isValidPass(passwordValue)) {
        setError(pass, 'invalid password')
    } else {
        setSuccess(pass);
        isPassLogin = true;
    }

    if(isUserLogin && isPassLogin){
        isValidLogin = true;
    }

    return isValidLogin;
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