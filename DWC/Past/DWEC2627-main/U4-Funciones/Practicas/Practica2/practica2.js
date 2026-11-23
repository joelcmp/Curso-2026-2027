let palabras = pedirPalabras();

// Contamos las apariciones de cada palabra
let numeroDePalabras = contarPalabras(palabras);

// Mostramos el resultado por pantalla
let resultado = document.getElementById("resultado");

if (numeroDePalabras.size > 0) {
    numeroDePalabras.forEach(function(cantidad, palabra) {
        resultado.innerHTML += palabra + ": " + cantidad + "<br>";
    });
} else {
    resultado.textContent = "No se han introducido palabras.";
}
