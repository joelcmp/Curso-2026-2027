let imagenFondo = document.getElementById("imagen");

// Función que cambia la imagen del fondo
function cambiarImagenFondo(evento) {
    // Comprobamos que se pula ALT + F12
    if (evento.altKey && evento.key == "F12") {
        // Añadimos un math.random para que genere imagenes aleatorias partiendo del servicio picsum.photos
        imagenFondo.style.backgroundImage = 'url("https://picsum.photos/1920/1080?random=' + Math.random() + '")';
    }
}

document.addEventListener("keydown", cambiarImagenFondo);