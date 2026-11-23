const palabras = ["ana", "radar", "javascript", "reconocer", "oro", "palindromo", "salas"];

let palindromos = [];

// Recorremos el array
for (let i in palabras) {
    let palabra = palabras[i];
    let invertida = palabra.split("");
    invertida.reverse();
    
    // Si la palabra es igual a la palabra invertida entonces lo guardamos en palindromos
    if (palabra == invertida.join("")) {
        palindromos[palindromos.length] = palabra;
    }
}

console.log("Palindromos:")
console.log(...palindromos);