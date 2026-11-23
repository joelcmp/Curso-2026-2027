let data = [ 
    {name: "Nacho", telephone: "966112233", age: 40},
    {name: "Ana", telephone: "911223344", age: 35},
    {name: "Mario", phone: "611998877", age: 15},
    {name: "Laura", telephone: "633663366", age: 17}
];

// Añadimos dos elementos al final y comprobamos el resultado
data.push(
    {name: "Pedro", telephone: "611944444", age: 25},
    {name: "Julia", phone: "633232323", age: 37}
);

// Validamos que se hayan añadido las dos personas
if (data.length === 6) {
    console.log("Se han añadido las dos personas");
} else {
    console.log("Error: el número de personas no es correcto");
}

console.log("DATA CON LOS NUEVOS ELEMENTOS");
for (let i = 0; i < data.length; i++) {
    console.log(
        "Nombre: " + data[i].name +
        " | Edad: " + data[i].age +
        " | Teléfono: " + (data[i].telephone || data[i].phone)
    );
}

// Ordenamos por edad
data.sort(function (a1, a2) {
    return a1.age - a2.age;
});

console.log("DATA ORDENADA POR EDAD:");
for (let i = 0; i < data.length; i++) {
    console.log(
        "Nombre: " + data[i].name +
        " | Edad: " + data[i].age +
        " | Teléfono: " + (data[i].telephone || data[i].phone)
    );
}

// Ordenamos por nombre alfabéticamente
data.sort(function(n1, n2) {
    return n1.name.localeCompare(n2.name);
});

console.log("DATA ORDENADA POR NOMBRE:");
for (let i = 0; i < data.length; i++) {
    console.log(
        "Nombre: " + data[i].name +
        " | Edad: " + data[i].age +
        " | Teléfono: " + (data[i].telephone || data[i].phone)
    );
}

// Creamos un nuevo array con los mayores de 30 años
let mayoresDe30 = data.filter(function (persona) {
    return persona.age > 30;
});

// Validamos que todas las personas tengan más de 30 años
if (mayoresDe30.every(function (persona) {
    return persona.age > 30;
})) {
    console.log("Todas las personas tienen más de 30 años");
} else {
    console.log("Error: hay personas de 30 años o menos");
}

console.log("PERSONAS MAYORES DE 30 AÑOS:");
for (let i = 0; i < mayoresDe30.length; i++) {
    console.log(
        "Nombre: " + mayoresDe30[i].name +
        " | Edad: " + mayoresDe30[i].age +
        " | Teléfono: " + (mayoresDe30[i].telephone || mayoresDe30[i].phone)
    );
}