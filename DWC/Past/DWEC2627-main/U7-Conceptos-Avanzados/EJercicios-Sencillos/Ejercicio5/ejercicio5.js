function primeraTarea() {
    return Promise.resolve(10);
}

function segundaTarea(valor) {
    return Promise.resolve(valor * 2);
}

function terceraTarea(valor) {
    return Promise.resolve(valor + 5);
}

// Consumir la promesa encadenando las funciones con then y catch
primeraTarea()
    .then((resultado) => {
        return segundaTarea(resultado);
    })
    .then((resultado) => {
        return terceraTarea(resultado);
    })
    .then((resultado) => {
        console.log("Resultado final:", resultado);
    });
