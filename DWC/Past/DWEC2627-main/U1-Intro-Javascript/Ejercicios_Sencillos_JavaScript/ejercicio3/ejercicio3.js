/*
Modifica el programa del ejercicio 2 para que cuente tanto las ‘a’ minúsculas
como las mayúsculas.
*/
let texto = window.prompt("Introduce una cadena de texto");

let contador = 0;

for (let i = 0; i < texto.length; i++) {
    if (texto[i] === "a" || texto[i] === "A") {
        contador++;
    }
}

window.alert('La cadena tiene un total de '+ contador +' letras "a"');