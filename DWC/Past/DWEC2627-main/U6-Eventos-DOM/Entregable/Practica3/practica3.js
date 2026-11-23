let capa1 = document.getElementById("capa1");
let capa2 = document.getElementById("capa2");

// Función que se ejecuta al comenzar el arrastre
function comenzarArrastre() {
    capa1.style.opacity = "0.5";
}

// Función que se ejecuta mientras arrastramos la capa
function arrastrar() {
    capa2.style.backgroundColor = "red";
}

// Función que se ejecuta al finalizar el arrastre
function finalizarArrastre() {
    capa1.style.opacity = "1";
    capa2.style.backgroundColor = "white";
}

// Función que permite soltar la capa sobre el destino
function permitirSoltar(evento) {
    evento.preventDefault();
}

// Función que se ejecuta al soltar la capa
function soltarCapa(evento) {
    evento.preventDefault();

    capa1.style.display = "none";
    capa2.textContent = "Lo has logrado";
    capa2.style.backgroundColor = "white";
}

// Eventos de la primera capa
capa1.addEventListener("dragstart", comenzarArrastre);
capa1.addEventListener("drag", arrastrar);
capa1.addEventListener("dragend", finalizarArrastre);

// Eventos de la segunda capa
capa2.addEventListener("dragover", permitirSoltar);
capa2.addEventListener("drop", soltarCapa);
