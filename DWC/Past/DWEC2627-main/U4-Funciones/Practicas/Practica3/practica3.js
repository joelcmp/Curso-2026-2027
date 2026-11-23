// Multiplicamos los números por 2
let numeros = [1, 2, 3, 4];
document.getElementById("array1").textContent = numeros.join(", ");

filtro(numeros, function(numero) {
    return numero * 2;
});

document.getElementById("resultado1").textContent = numeros.join(", ");

// Convertimos palabras a mayúsculas
let palabras = ["hola", "casa", "perro"];
document.getElementById("array2").textContent = palabras.join(", ");

filtro(palabras, function(palabra) {
    return palabra.toUpperCase();
});

document.getElementById("resultado2").textContent = palabras.join(", ");

// Calculamos los factoriales
let factoriales = [1, 2, 3, 4, 5];
document.getElementById("array3").textContent = factoriales.join(", ");

filtro(factoriales, function(numero) {
    return factorial(numero);
});

document.getElementById("resultado3").textContent = factoriales.join(", ");
