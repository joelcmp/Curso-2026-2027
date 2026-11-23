/*
Diseña un programa en JavaScript que permita al usuario introducir tres
valores numéricos en un pequeño formulario. Al enviar el formulario, el programa
informará, mediante ventana emergente, de cuál de los tres números introducidos es el
mayor.

Nota: el programa nunca seleccionará el número mayor si alguno de los campos está en
blanco o el valor que contiene no es numérico.
*/

function buscarMayor() {
    let n1 = document.getElementById("numero1").value;
    let n2 = document.getElementById("numero2").value;
    let n3 = document.getElementById("numero3").value;

    if (n1 === "" || n2 === "" || n3 === "") {
        window.alert("Debes rellenar los tres campos.");
        return;
    }
    if (isNaN(n1) || isNaN(n2) || isNaN(n3)) {
        window.alert("Todos los valores deben ser numéricos.");
        return;
    }
    n1 = Number(n1);
    n2 = Number(n2);
    n3 = Number(n3);

    let mayor = Math.max(n1, n2, n3);

    window.alert("El mayor número es el " + mayor);
}