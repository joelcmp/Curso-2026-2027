let data = [ 
    {
        name: "Nacho",
        telephone: "966112233",
        age: 40
    },
    {
        name: "Ana",
        telephone: "911223344",
        age: 35
    },
    {
        name: "Mario",
        phone: "611998877",
        age: 15
    },
    {
        name: "Laura",
        telephone: "633663366",
        age: 17
    }
];

// Añadimos dos elementos al final y comprobamos el resultado
data.push(
    {
        name: "Pedro",
        telephone: "611944444",
        age: 25
    },
    {
        name: "Julia",
        phone: "633232323",
        age: 37
    }
);

console.log("Nuevos elementos añadidos");
console.log(data);

// Ordenamos por edad y comprobamos el resultado
data.sort(function (a1, a2) {
    return a1.age - a2.age;
});

console.log("Data ordenada por edad:");
console.log(data);

// Ordenamos por nombre alfabéticamente
data.sort(function(n1, n2) {
    return n1.name.localeCompare(n2.name);
});

console.log("Data ordenada por nombre:");
console.log(data);

// Creamos un nuevo array con los mayores de 30 años
let mayoresDe30 = data.filter(function (persona) {
    return persona.age > 30;
});

console.log("Personas mayores de 30 años:");
console.log(mayoresDe30);