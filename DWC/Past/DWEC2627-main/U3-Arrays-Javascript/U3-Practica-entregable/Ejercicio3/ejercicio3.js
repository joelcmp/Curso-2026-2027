let mapa = new Map();

// Añadimos 3 personas
mapa.set("Ana", 21);
mapa.set("Pedro", 25);
mapa.set("Laura", 30);

// Comprobamos si Ana existe antes de modificar su edad
if (mapa.has("Ana")) {
    // Modificamos la edad de una de ellas
    mapa.set("Ana", 29);
    console.log("La edad de Ana se ha actualizado correctamente");
} else {
    console.log("Error: Ana no existe en el mapa");
}

// Validamos que Ana tenga la edad correcta
if (mapa.get("Ana") === 29) {
    console.log("Ahora Ana tiene 29 años");
} else {
    console.log("Error: la edad de Ana no se ha actualizado");
}

// Recorremos el mapa y mostramos el nombre y edad
console.log("Nombre    |    Edad");
for (let [clave, valor] of mapa) {
    console.log(clave + "   |   " + valor);
}