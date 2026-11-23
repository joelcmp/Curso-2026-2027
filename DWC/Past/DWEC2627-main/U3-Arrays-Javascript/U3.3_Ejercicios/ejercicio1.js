let numeros = [10, 20, 30, 40, 50, 60];

console.log("numeros = " + numeros);

let [primero, segundo, ...resto] = numeros;

console.log("Primer número: " + primero);
console.log("Segundo número: " + segundo);
console.log("Resto de números: " + resto);