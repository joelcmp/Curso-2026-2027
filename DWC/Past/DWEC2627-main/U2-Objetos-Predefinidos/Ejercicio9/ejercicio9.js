function comprobarFecha() {
    let fecha = document.getElementById("fecha").value;
    let fechaRegExp = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/(\d{2}|\d{4})$/;

    // Comprobamos que se cumpla la expresion regular
    if (fechaRegExp.test(fecha)) {
        alert("Gracias por introducir la fecha");
    } else {
        alert("El formato de fecha no es correcto");
    }
}