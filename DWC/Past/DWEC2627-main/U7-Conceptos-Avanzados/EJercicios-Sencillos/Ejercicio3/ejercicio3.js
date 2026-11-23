function simulaProceso(exito) {
    return new Promise((resolve, reject) => {
        if(exito) {
            resolve("Proceso exitoso");
        } else {
            reject(Error('Hubo un error'));
        }
    });
}

// Consumir la promesa con then y catch
simulaProceso(true)
    .then((resultado) => {
        console.log(resultado);
    })
    .catch((error) => {
        console.log("Error:", error.message);
    });

simulaProceso(false)
    .then((resultado) => {
        console.log(resultado);
    })
    .catch((error) => {
        console.log("Error:", error.message);
    });

// Consumir la promesa con async/await
async function probarProceso(exito) {
    try {
        let resultado = await simulaProceso(exito);
        console.log(resultado);
    } catch (error) {
        console.log("Error:", error.message);
    }
}

probarProceso(true);
probarProceso(false);