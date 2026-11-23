let mapa = new Map();

// Añadimos 3 personas
mapa.set("Ana", 21);
mapa.set("Pedro", 25);
mapa.set("Laura", 30);

// Modificamos la edad de una de ellas
mapa.set("Ana", 29);

// Recorremos el mapa y mostramos el nombre y edad
console.log("Nombre    |    Edad");
for (let [clave, valor] of mapa) {
    console.log(clave + "   |   " + valor);
}