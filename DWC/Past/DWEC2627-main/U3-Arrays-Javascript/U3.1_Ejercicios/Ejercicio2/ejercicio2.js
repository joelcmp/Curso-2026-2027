const paises = ["España", "Francia", "Alemania", "Italia"];

// Recorremos y mostramos todos
for (let i in paises) {
    console.log(paises[i]);
}

// Borramos el primero
delete paises[0];

// Volvemos a recorrerlo
for (let i in paises) {
    console.log(paises[i]);
}