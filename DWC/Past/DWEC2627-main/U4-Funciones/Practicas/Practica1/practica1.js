let palabras = pedirPalabras();

// Eliminamos las palabras duplicadas
let palabrasUnicas = [...new Set(palabras)];

// Ordenamos las palabras de Z a A
palabrasUnicas.sort((a, b) => b.localeCompare(a, "es"));

// Mostramos el resultado por pantalla
let resultado = document.getElementById("resultado");

if (palabrasUnicas.length > 0) {
    resultado.textContent = palabrasUnicas.join(", ");
} else {
    resultado.textContent = "No se han introducido palabras.";
}
