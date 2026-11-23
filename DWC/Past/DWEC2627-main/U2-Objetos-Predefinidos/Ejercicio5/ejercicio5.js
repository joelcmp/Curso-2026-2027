function calcularMayor() {
    let numeros = [];

    for (let i = 1; i <= 9; i++) {
        let numero = Number(document.getElementById("n" + i).value);
        numeros.push(numero);
    }

    let mayor = numeros[0];

    for (let i = 1; i < numeros.length; i++) {
        if (numeros[i] > mayor) {
            mayor = numeros[i];
        }
    }

    alert("El mayor numero es " + mayor);
}