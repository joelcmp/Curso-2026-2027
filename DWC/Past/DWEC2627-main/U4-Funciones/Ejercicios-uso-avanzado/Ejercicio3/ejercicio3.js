const personas = [
    { nombre: "Juan", edad: 17 },
    { nombre: "Ana", edad: 22 },
    { nombre: "Pedro", edad: 19 },
    { nombre: "Laura", edad: 16 }
];

// Filtramos las personas mayores de 18 años
let mayoresDe18 = personas.filter(function(persona) {
    return persona.edad > 18;
});

// Multiplicamos sus edades por 2
let edadesDuplicadas = mayoresDe18.map(function(persona) {
    return persona.edad * 2;
});

// Sumamos las edades multiplicadas por 2
let sumaEdades = edadesDuplicadas.reduce(function(suma, edad) {
    return suma + edad;
}, 0);

console.log("Personas mayores de 18 años:");
mayoresDe18.forEach(function(persona) {
    console.log(persona.nombre + ": " + persona.edad);
});

console.log("Edades multiplicadas por 2: " + edadesDuplicadas);
console.log("Suma de las edades multiplicadas por 2: " + sumaEdades);
