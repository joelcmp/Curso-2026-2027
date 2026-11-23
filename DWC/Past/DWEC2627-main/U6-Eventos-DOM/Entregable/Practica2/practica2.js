let emailInput = document.getElementById("email");
let passwordInput = document.getElementById("password");
let emailError = document.getElementById("errorEmail");
let passwordError = document.getElementById("errorPassword");
let botonEnviar = document.getElementById("enviar");
let emailValido = false;
let passwordValido = false;

// Función que valida el email con una expresion regular
function validarEmail() {
    let email = document.getElementById("email").value;
    let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if(!regexEmail.test(email)) {
        emailError.textContent = "El email no cumple el formato requerido!";
        emailValido = false;
    } else {
        emailValido = true;
        emailError.textContent = "";
    }
    comprobarFormulario();
}

// Función que valida la contraseña segun la cantidad de caracteres
function validarPassword() {
    let password = document.getElementById("password").value;
    
    if (password.length < 8 || password.length > 10) {
        passwordError.textContent = "La contraseña debe tener entre 8 y 10 caracteres";
        passwordValido = false;
    } else {
        passwordValido = true;
        passwordError.textContent = "";
    }
    comprobarFormulario();
}

// Función que comprueba activa/desactiva el boton segun la validación
function comprobarFormulario() {
    botonEnviar.disabled = !(emailValido && passwordValido);
}

emailInput.addEventListener("blur", validarEmail);
passwordInput.addEventListener("blur", validarPassword);

emailInput.addEventListener("focus", function () {
    emailError.textContent = "";
    emailValido = false;
    comprobarFormulario();
});

passwordInput.addEventListener("focus", function () {
    passwordError.textContent = "";
    passwordValido = false;
    comprobarFormulario();
});
