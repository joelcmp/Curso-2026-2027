let valores = [4, 7, 4, 2, 7, 9, 2, 5];

// Eliminamos los duplicados con Set
let conjunto = new Set(valores);

// Convertimos el set en un array
let unicos = [...conjunto];

console.log("Array original:");
console.log(valores);

console.log("Array sin duplicados:");
console.log(unicos);