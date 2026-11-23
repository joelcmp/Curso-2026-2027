const numeros = [4, 21, 33, 12, 9, 54];

// Creamos nuevo array filtrando por pares
let numerosPares = numeros.filter(numero => numero % 2 === 0);

console.log("Array original = " + numeros);
console.log("Números pares = " + numerosPares);