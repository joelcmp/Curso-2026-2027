const productos = [
    { nombre: "Camiseta", precio: 20 },
    { nombre: "Pantalón", precio: 30 },
    { nombre: "Zapatos", precio: 50 }
];

console.log("Productos antes de actualizar los precios:");
productos.forEach(function(producto) {
    console.log(producto.nombre + ": " + producto.precio + " €");
});

// Incrementamos el precio un 10%
productos.forEach(function(producto) {
    producto.precio = producto.precio * 1.10;
});

console.log("Productos después de incrementar el precio un 10%:");
productos.forEach(function(producto) {
    console.log(producto.nombre + ": " + producto.precio.toFixed(2) + " €");
});