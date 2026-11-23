// Función que devuelve un array de las palabras obtenidas
function pedirPalabras() {
    let palabras = [];
    let palabra;

    while (true) {
        palabra = prompt("Introduce una palabra (vacío para terminar):");

        if (palabra === null || palabra.trim() === "") {
            break;
        }

        palabras.push(palabra.trim());
    }

    return palabras;
}

// Función que cuenta las palabras del array que se le envíe
function contarPalabras(palabras) {
    let mapa = new Map();

    // Si es nulo, devolvemos un mapa vacío
    if (palabras == null) {
        return mapa;
    }

    for (let i = 0; i < palabras.length; i++) {
        let palabra = palabras[i];

        // Si el mapa ya tiene esa palabra aumentamos el valor y si no, lo inicializamos en 1
        if (mapa.has(palabra)) {
            mapa.set(palabra, mapa.get(palabra) + 1);
        } else {
            mapa.set(palabra, 1);
        }
    }

    return mapa;
}

// Función que aplica una función callback a cada elemento del array
function filtro(array, callback) {
    for (let i = 0; i < array.length; i++) {
        array[i] = callback(array[i]);
    }
}

// Función que calcula el factorial de un número
function factorial(numero) {
    let resultado = 1;

    for (let i = 1; i <= numero; i++) {
        resultado *= i;
    }

    return resultado;
}