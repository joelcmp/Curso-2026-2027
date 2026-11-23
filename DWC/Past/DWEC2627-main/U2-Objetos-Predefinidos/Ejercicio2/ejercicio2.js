function mostrarPalabra() {
    let palabra = "HOLA";

    let tabla = document.createElement("table");
    let fila = document.createElement("tr");

    for (let i = 0; i < palabra.length; i++) {
        let celda = document.createElement("td");
        celda.innerText = palabra[i];
        fila.appendChild(celda);
    }

    tabla.appendChild(fila);
    document.getElementById("tabla").appendChild(tabla);
}