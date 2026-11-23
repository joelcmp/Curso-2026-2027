function mostrarPosicionMouse(evento) {
    let x = evento.screenX;
    let y = evento.screenY;

    document.getElementById("posicion").textContent = "X: "+ x + " - Y: " + y;
}

document.addEventListener("mousemove", mostrarPosicionMouse);