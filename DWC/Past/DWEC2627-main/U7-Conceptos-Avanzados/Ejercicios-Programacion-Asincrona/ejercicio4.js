function tirarDado() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let nRandom = Math.floor(Math.random() * 6) + 1;

            if (nRandom == 1) {
                reject(Error("Ha salido un 1: pierdes"));
            } else {
                resolve(nRandom);
            }
        }, 1000);
    });
}

tirarDado()
    .then((numero) => console.log("Has sacado un " + numero))
    .catch((error) => console.log(error.message))
    .finally(() => console.log("Fin de la tirada"));