// Funciones comunes para las practicas

function mostrarTitulo(texto) {
    let titulo = document.createElement("h2");
    titulo.textContent = texto;
    resultado.appendChild(titulo);
}

function mostrarResultado(texto) {
    let parrafo = document.createElement("p");
    parrafo.textContent = texto;
    resultado.appendChild(parrafo);
}