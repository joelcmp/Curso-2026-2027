/*
Escribe un programa en JavaScript que pida al usuario que introduzca una
cadena de texto. Mediante una ventana emergente, el programa mostrará cuántas letras
‘a’ hay en la cadena de texto introducida.
*/
let texto = window.prompt("Introduce una cadena de texto");

let contador = 0;

for (let i = 0; i < texto.length; i++) {
    if (texto[i] === "a") {
        contador++;
    }
}

window.alert('La cadena tiene un total de '+ contador +' letras "a"');