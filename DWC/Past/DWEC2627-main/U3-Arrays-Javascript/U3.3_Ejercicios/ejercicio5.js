let palabras = ["hola", "adios", "hola", "javascript", "hola", "adios"];

console.log("palabras = " + palabras);

// Funcion que crea un mapa con palabras como clave y sus ocurrencias como valor
function contarOcurrencias(array) {
    let ocurrencias  = new Map();

    for (const element of array) {
        // Si existe el elemento sumamos una ocurrencia mas, si no, se inicializa en 1
        if (ocurrencias.has(element)) {
            ocurrencias.set(element, ocurrencias.get(element) + 1);
        } else {
            ocurrencias.set(element, 1);
        }
    }

    return ocurrencias;
}

// Recorremos el mapa y mostramos las palabras y sus ocurrencias
console.log("Palabra    |   Nº de Ocurrencias");
for (const [clave, valor] of contarOcurrencias(palabras)) {
    console.log(clave + "    |   " + valor);
}
