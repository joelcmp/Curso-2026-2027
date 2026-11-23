let numeros = [1, 2, 3, 4, 5];

// Suma de forma iterativa
function sumaIterativa(array) {
    let suma = 0;

    for (let i = 0; i < array.length; i++) {
        suma += array[i];
    }

    return suma;
}

// Suma de forma recursiva
function sumaRecursiva(array, posicion = 0) {
    if (posicion === array.length) {
        return 0;
    }

    return array[posicion] + sumaRecursiva(array, posicion + 1);
}

console.log("Array de números: " + numeros);
console.log("Suma iterativa: " + sumaIterativa(numeros));
console.log("Suma recursiva: " + sumaRecursiva(numeros));