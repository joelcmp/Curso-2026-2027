const lista = new Set(["Ana", "Pedro", "Laura"]);

// Añadimos un nuevo nombre
lista.add("Isaias");

// Verificamos si un nombre en específico está en el set
console.log("Laura existe en la lista? " + lista.has("Laura"));

// Eliminamos un nombre
lista.delete("Ana");

console.log(lista);