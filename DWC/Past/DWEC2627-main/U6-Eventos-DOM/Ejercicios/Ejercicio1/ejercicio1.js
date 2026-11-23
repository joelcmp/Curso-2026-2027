// Función que añade un nuevo número a la lista desordenada
function addNumero() {
    let nuevoNumero = document.createElement("li");

    nuevoNumero.textContent = Math.floor(Math.random() * 1000000);

    document.getElementById("listaNumeros").appendChild(nuevoNumero);
}

document.getElementById("nuevoNumero").addEventListener("click", addNumero);