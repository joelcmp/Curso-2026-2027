function generaTemporizador(milisegundos) {
    return new Promise((resolve, reject) => {
        let temporizadorError = setTimeout(() => {
            reject("El tiempo no va bien");
        }, milisegundos * 2);
        
        setTimeout(() => {
            clearTimeout(temporizadorError);
            resolve("Tiempo concluido");
        }, milisegundos);
    });
}

generaTemporizador(5000)
    .then((resultado) => {
        document.getElementById("resultado").textContent = resultado;
    })
    .catch((error) => {
        document.getElementById("resultado").textContent = error;
    });