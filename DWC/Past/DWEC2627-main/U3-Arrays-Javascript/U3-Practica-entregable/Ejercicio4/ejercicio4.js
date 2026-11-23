// Creamos 50 combinaciones y las mostramos por consola
for (let i = 0; i < 50; i++) {
    let numeros = new Set();

    // Mientras el tamaño del conjunto sea menor de 6 añadimos numeros random
    while (numeros.size < 6) {
        let numero = Math.floor(Math.random() * 49) + 1;
        numeros.add(numero);
    }

    // Validamos la cantidad de números
    if (numeros.size === 6) {
        console.log("Combinación " + (i + 1) + ":");
        console.log([...numeros].join(", "));
    } else {
        console.log("Error: la combinación no tiene 6 números");
    }
}