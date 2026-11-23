function obtenerUsuario() {
    return new Promise((resolver) => {
        setTimeout(() => resolver({ nombre: 'Ana', id: 7 }), 1000);
    });
}

function obtenerPedidos(usuario) {
    return new Promise((resolver, rechazar) => {
        setTimeout(() => {
            if (usuario.id > 0) resolver(['libro', 'teclado']);
            else rechazar(Error('Usuario no válido'));
        }, 1000);
    });
}

obtenerUsuario()
    .then((usuario) => {
        console.log(`Usuario: ${usuario.nombre}`);
        return obtenerPedidos(usuario);
    })
    .then((pedidos) => {
        console.log('Número de pedidos: ' + pedidos.length);
    })
    .catch((error) => console.log(error.message));